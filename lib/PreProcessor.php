<?php

declare(strict_types=1);

namespace FFIMe;

class PreProcessor {

    private Parser $parser;
    private array $headers = [];
    private Context $context;

    public function __construct(Context $context, Parser $parser = null) {
        $this->parser = $parser ?? new Parser;
        $this->context = $context;
    }

    public function process(string $header): array {
        if (empty($header)) {
            throw new \LogicException("Header cannot be empty");
        }
        $lines = $this->findAndParse($header, '');

        $result = [];
        while (!empty($lines)) {
            $line = array_shift($lines);
            if (empty($line)) {
                continue;
            }
            if ($line[0]->type === Token::PUNCTUATOR && $line[0]->value === '#') {
                array_shift($line); // get rid of the punctuator
                if (empty($line)) {
                    continue; // ignore blank preprocessor directives
                }
                $directive = array_shift($line); 
                if ($directive->type !== Token::IDENTIFIER) {
                    var_dump($directive, $line);
                    die("Unknown directive");
                }
                switch ($directive->value) {
                    case 'include':
                        $tokens = $this->resolveInclude($line, $directive->file);
                        $lines = array_merge($tokens, $lines);
                        break;
                    case 'define':
                        if (count($line) < 1) {
                            throw new \LogicException("#define must have a name");
                        }
                        $identifier = array_shift($line);
                        if ($identifier->type !== Token::IDENTIFIER) {
                            throw new \LogicException("Only #define identifiers");
                        }
                        $this->context->define($identifier->value, $line);
                        break;
                    case 'undef':
                        if (count($line) !== 1) {
                            throw new \LogicException("#undef must only have a single argument");
                        }
                        $identifier = array_shift($line);
                        if ($identifier->type !== Token::IDENTIFIER) {
                            throw new \LogicException("Undef only works on identifiers");
                        }
                        if (!empty($line)) {
                            var_dump($line);
                            die("failed parsing undef");
                        }
                        $this->context->undefine($identifier->value);
                        break;
                    case 'if':
                        if (empty($line)) {
                            throw new \LogicException("At least one declaration is required for if");
                        }
                        if (!$this->evaluateIf($line)) {
                            $lines = $this->skipIf($lines);
                        }
                        break;
                    case 'ifdef':
                    case 'ifndef':
                        if (count($line) !== 1) {
                            throw new \LogicException("Only a single arg is allowed for #{$directive->value}");
                        }
                        if ($line[0]->type !== Token::IDENTIFIER) {
                            throw new \LogicException("Only an identifier arg is allowed for #{$directive->value}");
                        }
                        $tmp = $this->context->isDefined($line[0]->value);
                        if ($tmp xor $directive->value === 'ifdef') {
                            // skip if they aren't the same boolean value
                            // if value is ifdef, skip if result is false
                            // if value is ifndef, skip if result is true
                            $lines = $this->skipIf($lines);
                        }
                        break;
                    case 'else':
                        $lines = $this->skipIf($lines);
                        break;
                    case 'endif':
                        // ignore
                        break;
                    default:
                        var_dump($directive->value);
                        die("unknown directive");
                }
            } else {
                $result[] = $line;
            }
        }
        return $result;
    }

    private function evaluateIf(array $expr): bool {
        if (empty($expr)) {
            return false;
        }
        if ($expr[0]->type === Token::IDENTIFIER && $expr[0]->value === 'defined') {
            // special case for defined
            if (count($expr) < 4) {
                throw new \LogicException("Syntax Error for defined(identifier) expression: not enough tokens");
            }
            $tmp = array_shift($expr); // get rid of defined token
            $tmp = array_shift($expr);
            if ($tmp->type !== Token::PUNCTUATOR && $tmp->value !== '(') {
                throw new \LogicException("Syntax Error for defined(identifier) expression: ( not found");
            }
            $id = array_shift($expr);
            if ($id->type !== Token::IDENTIFIER) {
                throw new \LogicException("Syntax Error for defined(identifier) expression: identifier not found");
            }
            $tmp = array_shift($expr);
            if ($tmp->type !== Token::PUNCTUATOR && $tmp->value !== ')') {
                throw new \LogicException("Syntax Error for defined(identifier) expression: ) not found");
            }
            $result = $this->context->isDefined($id->value);
        } else {
            $token = $this->context->evaluate(...$expr);
            if ($token->type === Token::NUMBER && $token->value === '0') {
                //TODO: lookup if rules
                $result = false;
            } else {
                $result = true;
            }
            $expr = [];
        }
        while (!empty($expr)) {
            if (count($expr) >= 2) {
                if ($expr[0]->value === '&' && $expr[1]->value === '&') {
                    array_shift($expr);
                    array_shift($expr);
                    $tmpResult = $this->evaluateIf($expr);
                    return $result && $tmpResult;
                } else {
                    var_dump($expr);
                    die("Unknown combinor");
                }
            } else {
                var_dump($expr);
                die("Unknown trailing tokens");
            }
        }
        return $result;
    }

    private function skipIf(array $lines, bool $skipAll = false): array {
        while (!empty($lines)) {
            $line = array_shift($lines);
            if (count($line) < 2) {
                continue;
            }
            if ($line[0]->type === Token::PUNCTUATOR && $line[0]->value === '#') {
                if ($line[1]->type === Token::IDENTIFIER) {
                    switch ($line[1]->value) {
                        case 'if':
                        case 'ifdef':
                            $lines = $this->skipIf($lines, true);
                            break;
                        case 'endif':
                            return $lines;
                        case 'elif':
                            if ($skillAll) {
                                break;
                            }
                            array_shift($line);
                            array_shift($line);
                            if ($this->evaluateIf($line)) {
                               return $lines;
                            }
                            break;
                        case 'else':
                            if ($skipAll) {
                                break;
                            }
                            return $lines;
                        case 'define':
                        case 'include':
                        case 'undef':
                            break;
                        default:
                            var_dump($line[1]->value);
                            die("Unknown directive 2");
                    }
                }
            }
        }
        return [];
    }

    private function findAndParse(string $header, string $contextDir): array {
        $contextDir = rtrim($contextDir, '/');
        $file = $this->findHeaderFile($header, $contextDir);
        if (!isset($this->headers[$file])) {
            $code = file_get_contents($file);
            $this->headers[$file] = $this->parser->parse($file, $code);
        }
        return $this->headers[$file];
    }

    private function resolveInclude(array $args, string $contextFile): array {
        $contextDir = dirname($contextFile);
        if (empty($args)) {
            throw new \LogicException("Empty include declaration");
        }
        $type = array_shift($args);
        if ($type->type === Token::LITERAL) {
            $file = $type->value;
            if (!empty($args)) {
                throw new \LogicException("extra tokens in #include directive");
            }
            return $this->findAndParse($file, $contextDir);
        } elseif ($type->type === Token::PUNCTUATOR && $type->value === '<' && !empty($args)) {
            // handle <> include:
            $file = '';
            while (!empty($args)) {
                $node = array_shift($args);
                if ($node->type === Token::PUNCTUATOR && $node->value === '>') {
                    break;
                }
                $file .= $node->value;
            }
            if (!empty($args)) {
                throw new \LogicException("extra tokens in #include directive");
            }
            return $this->findAndParse($file, $contextDir);
        }
        var_dump($type, $args);
        throw new \LogicException("Illegal include directive");
    }

    private function findHeaderFile(string $header, string $contextDir): string {
        if ($header[0] === '/') {
            if (file_exists($header)) {
                return $header;
            }
        } else {
            if ($contextDir) {
                $dir = $contextDir;
                while (!empty($dir) && $dir !== '/') {
                    $file = "$dir/$header";
                    if (file_exists($file)) {
                        return $file;
                    }
                    $dir = dirname($dir);
                }
            }
            throw new \LogicException("TODO: Implement header search paths: $header");
        }
        throw new \LogicException("Could not find header file: $header given context $contextDir");
    }

}