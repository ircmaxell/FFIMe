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
            if ($line->type === Token::PUNCTUATOR && $line->value === '#') {
                $line = $line->next;
                if (empty($line)) {
                    continue; // ignore blank preprocessor directives
                }
                $directive = $line;
                $line = $line->next; 
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
                        if (empty($line)) {
                            throw new \LogicException("#define must have a name");
                        }
                        $identifier = $line;
                        if ($identifier->type !== Token::IDENTIFIER) {
                            throw new \LogicException("Only #define identifiers");
                        }
                        $this->context->define($identifier->value, $line->next);
                        break;
                    case 'undef':
                        if (empty($line)) {
                            throw new \LogicException("#undef must only have a single argument");
                        }
                        $identifier = $line;
                        if ($identifier->type !== Token::IDENTIFIER) {
                            throw new \LogicException("Undef only works on identifiers");
                        }
                        if (!empty($line->next)) {
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
                        if (empty($line)) {
                            throw new \LogicException("Only a single arg is allowed for #{$directive->value}");
                        }
                        if ($line->type !== Token::IDENTIFIER) {
                            throw new \LogicException("Only an identifier arg is allowed for #{$directive->value}");
                        }
                        $tmp = $this->context->isDefined($line->value);
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
            if (empty($line) || empty($line->next)) {
                continue;
            }
            if ($line->type === Token::PUNCTUATOR && $line->value === '#') {
                if ($line->next->type === Token::IDENTIFIER) {
                    switch ($line->next->value) {
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
                            $line = $line->next->next;
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
                            var_dump($line->next->value);
                            die("Unknown directive 2");
                    }
                }
            }
        }
        return [];
    }

    private function findAndParse(string $header, string $contextDir): array {
        if ($header === 'stdio.h') {
            $header = __DIR__ .  '/../include/stdio.h';
        }
        $contextDir = rtrim($contextDir, '/');
        $file = $this->findHeaderFile($header, $contextDir);
        $code = file_get_contents($file);
        return $this->parser->parse($file, $code);
    }

    private function resolveInclude(?Token $arg, string $contextFile): array {
        $contextDir = dirname($contextFile);
        if (empty($arg)) {
            throw new \LogicException("Empty include declaration");
        }
        $type = $arg;
        if ($type->type === Token::LITERAL) {
            $file = $type->value;
            if (!empty($args)) {
                throw new \LogicException("extra tokens in #include directive");
            }
            return $this->findAndParse($file, $contextDir);
        } elseif ($type->type === Token::PUNCTUATOR && $type->value === '<' && !empty($arg->next)) {
            // handle <> include:
            $file = '';
            while (!empty($arg->next)) {
                $arg = $arg->next;
                if ($arg->type === Token::PUNCTUATOR && $arg->value === '>') {
                    break;
                }
                $file .= $arg->value;
            }
            if (!empty($args)) {
                throw new \LogicException("extra tokens in #include directive");
            }
            return $this->findAndParse($file, $contextDir);
        }
        var_dump($type, $arg);
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