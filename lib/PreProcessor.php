<?php

declare(strict_types=1);

namespace FFIMe;

class PreProcessor {

    private Parser $parser;
    private array $headers = [];
    private Context $context;
    private ?CallStack $callStack = null;
    private ?Token $rerun = null;

    public function __construct(Context $context, Parser $parser = null) {
        $this->parser = $parser ?? new Parser;
        $this->context = $context;
    }

    public function process(string $header): array {
        if (empty($header)) {
            throw new \LogicException("Header cannot be empty");
        }
        $lines = $this->findAndParse($header, '', '');

        $result = [];
        while (!empty($lines)) {
            $line = array_shift($lines);
            $line = Token::skipWhitespace($line);
            if (empty($line)) {
                continue;
            }
            if ($line->type === Token::PUNCTUATOR && $line->value === '#') {
                $line = Token::skipWhitespace($line->next);
                if (empty($line)) {
                    continue; // ignore blank preprocessor directives
                }
                $directive = $line;
                $line = Token::skipWhitespace($directive->next); 

                if ($directive->type !== Token::IDENTIFIER) {
                    var_dump($directive, $line);
                    throw new \LogicException("Unknown directive found {$directive->value}");
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
                        if (!empty(Token::skipWhitespace($line->next))) {
                            var_dump($directive, $identifier, $line);
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
                    case 'elif':
                        $lines = $this->skipIf($lines);
                        break;
                    case 'endif':
                        // ignore
                        break;
                    case 'error':
                        var_dump($this->context);
                        $this->debug($directive);
                        throw new \LogicException('We reached an error preprocessor token:');
                    default:
                        var_dump($directive->value);
                        throw new \LogicException("Unknown directive found {$directive->value}");
                }
            } else {
                $result[] = $this->expandMacros($line);
            }
        }
        if ($this->callStack !== null) {
            throw new \LogicException("Non-empty call stack found");
        }
        return $result;
    }

    private function evaluateIf(?Token $expr): bool {
        $expr = Token::skipWhitespace($expr);
        if ($expr === null) {
            return false;
        }

        $token = $this->context->evaluate($expr);
        if ($token->type === Token::NUMBER && $token->value === '0') {
            return false;
        }
        return true;
    }

    private function skipIf(array $lines, bool $skipAll = false): array {
        while (!empty($lines)) {
            $line = array_shift($lines);
            $line = Token::skipWhitespace($line);
            if (empty($line) || empty($line->next)) {
                continue;
            }
            if ($line->type === Token::PUNCTUATOR && $line->value === '#') {
                $next = Token::skipWhitespace($line->next);
                if ($next !== null && $next->type === Token::IDENTIFIER) {
                    switch ($next->value) {
                        case 'if':
                        case 'ifdef':
                        case 'ifndef':
                            $lines = $this->skipIf($lines, true);
                            break;
                        case 'endif':
                            return $lines;
                        case 'elif':
                            if ($skipAll) {
                                break;
                            }
                            $line = Token::skipWhitespace($next->next);
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
                        case 'error':
                        case 'warning':
                        case 'message':
                            break;
                        default:
                            throw new \LogicException("Unknown preprocessor directive to skip: " . $next->value);
                    }
                }
            }
        }
        return [];
    }

    private function findAndParse(string $header, string $contextDir, string $contextFile): array {
        $contextDir = rtrim($contextDir, '/');
        $file = $this->findHeaderFile($header, $contextDir, $contextFile);
        $code = file_get_contents($file);
        $lines = $this->parser->parse($file, $code);
        return $lines;
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
            return $this->findAndParse($file, $contextDir, $contextFile);
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
            // always a system import
            return $this->findAndParse($file, $contextDir, $contextFile);
        }
        var_dump($type, $arg);
        throw new \LogicException("Illegal include directive");
    }

    private function findHeaderFile(string $header, string $contextDir, string $contextFile): string {
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
            foreach ($this->context->headerSearchPaths as $path) {
                $test = $path . '/' . $header;
                if (file_exists($test)) {
                    return $test;
                }
            }
        }
        throw new \LogicException("Could not find header file: $header given context $contextDir (called from $contextFile)");
    }

    private function debug(?Token $token): void {
        echo "T: ";
        while ($token !== null) {
            echo $token->value . ' ';
            $token = $token->next;
        }
        echo "\n";
    }

    
    private function prepareAndDoCall(string $identifier, array $rawargs): ?Token {
        $args = [];
        $first = null;
        $firstTail = null;
        while (!empty($rawargs)) {
            $next = array_shift($rawargs);
restart:
            if ($next->value === ',') {
                if ($first === null) {
                    $args[] = new Token(Token::IDENTIFIER, '', 'internal');
                } else {
                    $args[] = $first;
                }
                $first = null;
                $firstTail = null;
            } elseif (is_null($firstTail)) {
                $first = $firstTail = new Token($next->type, $next->value, $next->file);
            } else {
                $firstTail = $firstTail->next = new Token($next->type, $next->value, $next->file);
            }
            if ($next->next !== null) {
                $next = $next->next;
                goto restart;
            }
        }
        if ($first !== null) {
            $args[] = $first;
        }
        return $this->context->doCall($identifier, ...$args);
    }

    private function expandMacros(?Token $expr, int $recurseLevel = 0): ?Token {
        $result = $head = new Token(0, '', 'internal');
        if ($this->callStack !== null) {
            $result = $this->callStack->currentArg->tail();
        } elseif ($this->rerun !== null) {
            $head = $this->rerun;
            $result = $this->rerun->tail();
            $this->rerun = null;
        }
        $rerun = false;
        while ($expr !== null) {
            if ($expr->type === Token::IDENTIFIER && $this->context->isDefined($expr->value)) {
                if ($this->context->isCall($expr->value)) {
                    $next = Token::skipWhitespace($expr->next);
                    if ($next !== null && $next->value === '(') {
                        $this->callStack = new CallStack($expr->value, $this->callStack);
                        $result = $this->callStack->currentArg;
                        goto next;
                    } 
                    // It's not a call, so treat it literally
                    $result = $result->next = new Token($expr->type, $expr->value, $expr->file);
                    goto next;
                }
                $result->next = $this->context->expand($expr->value);
                $rerun = true;
                $result = $result->tail();
                goto next;
            } elseif ($this->callStack !== null && $this->callStack->openCount === 1 && $expr->value === ',') {
                $this->callStack->nextArg();
                $result = $this->callStack->currentArg;
                goto next;
            } elseif ($this->callStack !== null && $expr->value === '(') {
                $this->callStack->openCount++;
                if ($this->callStack->openCount === 1) {
                    // don't emit the call brackets
                    goto next;
                }
            } elseif ($this->callStack !== null && $expr->value === ')') {
                $this->callStack->openCount--;
                if ($this->callStack->openCount === 0) {
                    // execute the call
                    $rerun = true;
                    if ($this->callStack->currentArg->next !== null || !empty($this->callStack->args)) {
                        $this->callStack->nextArg();
                    }
                    $tmp = $this->context->doCall($this->callStack->toCall, ...$this->callStack->args);
                    $this->callStack = $this->callStack->prior;
                    if (is_null($this->callStack)) {
                        $head->tail()->next = $tmp;
                        $result = $head->tail();
                    } else {
                        $this->callStack->currentArg->tail()->next = $tmp;
                        $result = $this->callStack->currentArg->tail();
                    }
                    goto next;
                }
            } elseif ($this->callStack === null && $expr->value === '##') {
                // perform concatonation
                $next = Token::skipWhitespace($expr->next);
                if ($next === null) {
                    throw new \LogicException("Unknown concat between {$result->value} and null");
                }
                $result->value .= $next->value;
                $expr = Token::skipWhitespace($next->next);
                continue;
            }
            if ($expr->type !== Token::WHITESPACE) {
                $result = $result->next = new Token($expr->type, $expr->value, $expr->file);
            }
next:
            $expr = $expr->next;
        }
        if ($rerun) {
            if ($this->callStack !== null) {
                // enqueue rerun
                $this->rerun = $head;
                return null;
            } elseif ($recurseLevel > 100) {
                throw new \LogicException("Too much recurseLevel!!!");
                return $head->next;
            }
            return $this->expandMacros($head->next, $recurseLevel + 1);
        }
        return $head->next;
    }


}

class CallStack {
    public string $toCall;
    public int $openCount = 0;
    public array $args = [];
    public Token $currentArg;
    public ?CallStack $prior;

    public function __construct(string $toCall, ?CallStack $prior) {
        $this->toCall = $toCall;
        $this->prior = $prior;
        $this->currentArg = new Token(0, '', 'internal');
    }

    public function nextArg(): void {
        $this->args[] = $this->currentArg->next;
        $this->currentArg = new Token(0, '', 'internal');
    }
}