<?php

declare(strict_types=1);

namespace FFIMe;

class Context {
    private array $definitions = [];
    
    public array $headerSearchPaths = [];

    const DEFAULT_HEADER_SEARCH_PATHS = [
        '/usr/local/include',
        '/usr/include',
        '/usr/include/x86_64-linux-gnu',
        '/usr/include/linux',
    ];

    public function __construct(array $headerSearchPaths = []) {
        if (PHP_INT_MAX > 1<<32) {
            $this->define('__x86_64__', null);
            $this->define('__LP64__', null);
        }
        // The FFI library defines VA_LIST
        $this->define('__GNUC_VA_LIST', null);
        $this->define('__GNUC__', null);
        $this->define('__STDC__', null);
        $this->headerSearchPaths = array_merge($headerSearchPaths, self::DEFAULT_HEADER_SEARCH_PATHS);
        $this->locateGCCHeaderPaths();
    }

    private function locateGCCHeaderPaths() {
        if (is_dir('/usr/lib/gcc/x86_64-linux-gnu/')) {
            for ($i = 8; $i > 4; $i--) {
                if (is_dir('/usr/lib/gcc/x86_64-linux-gnu/' . $i)) {
                    $this->headerSearchPaths[] = '/usr/lib/gcc/x86_64-linux-gnu/' . $i . '/include';
                    return;
                }
            }
        }
    }

    public function define(string $identifier, ?Token $token): void {
        $this->definitions[$identifier] = $token;
    }

    public function undefine(string $identifier): void {
        unset($this->definitions[$identifier]);
    }

    public function isDefined(string $identifier): bool {
        return array_key_exists($identifier, $this->definitions);
    }

    public function isCall(string $identifier): bool {
        if (!$this->isDefined($identifier) || null === $this->definitions[$identifier]) {
            return false;
        }
        if ($this->definitions[$identifier]->value === '(') {
            return true;
        }
        return false;
    }

    public function expand(string $identifier): ?Token {
        if (!$this->isDefined($identifier)) {
            return null;
        }
        $def = $this->definitions[$identifier];
        $first = $newToken = new Token(0, '', 'internal');
        while ($def !== null) {
            $newToken = $newToken->next = new Token($def->type, $def->value, $def->file);
            $def = $def->next;
        }
        return Token::skipWhitespace($first->next);
    }

    public function getValue(string $identifier): mixed {
        return $this->evaluate($this->expand($identifier));
    }

    public function evaluate(?Token $expr): Token {
        $expr = Token::skipWhitespace($expr);
        if (empty($expr)) {
            return new Token(Token::NUMBER, '0', 'computed');
        } elseif ($this->count($expr) === 1) {
            // special case
            switch ($expr->type) {
                case Token::IDENTIFIER:
                    if ($this->isDefined($expr->value)) {
                        return $this->evaluate(...$this->definitions[$expr->value]);
                    }
                    return new Token(Token::NUMBER, '0', 'computed');
            }
            return $expr;
        } 
        list ($result, $expr) = $this->evaluateInternal($expr);
        if ($expr !== null) {
            throw new \LogicException('Syntax error: unknown trailing expr: ' . $expr->value);
        }
        return $result;
    }

    public function evaluateInternal(?Token $expr, bool $single = false): array {
        if ($expr === null) {
            return [new Token(Token::NUMBER, '0', 'computed'), null];
        }
        $negate = false;
restart:
        $expr = Token::skipWhitespace($expr);
        if ($expr->type === Token::PUNCTUATOR && $expr->value === '(') {
            list ($result, $expr) = $this->evaluateInternal($expr->next);
            if ($expr === null) {
                throw new \LogicException('Syntax error, missing )');
            } elseif ($expr->type !== Token::PUNCTUATOR || $expr->value !== ')') {
                throw new \LogicException('Syntax error, ) expected, found ' . $expr->value);
            }
            $expr = Token::skipWhitespace($expr->next);
        } elseif ($expr->type === Token::IDENTIFIER && $expr->value === 'defined') {
            $expr = Token::skipWhitespace($expr->next);
            if ($expr === null) {
                throw new \LogicException("Syntax Error for #defined expression: not enough tokens");
            }
            if ($expr->type === Token::PUNCTUATOR && $expr->value === '(') {
                $id = Token::skipWhitespace($expr->next);
                if ($id === null || $id->type !== Token::IDENTIFIER) {
                    throw new \LogicException("Syntax Error for defined(identifier) expression: identifier not found");
                }
                $expr = Token::skipWhitespace($id->next);
                if ($expr === null || $expr->type !== Token::PUNCTUATOR && $expr->value !== ')') {
                    throw new \LogicException("Syntax Error for defined(identifier) expression: ) not found");
                }
                $result = new Token(Token::NUMBER, $this->isDefined($id->value) ? '1' : '0', 'computed');
                $expr = Token::skipWhitespace($expr->next);
            } elseif ($expr->type === Token::IDENTIFIER) {
                $result = new Token(Token::NUMBER, $this->isDefined($expr->value) ? '1' : '0', 'computed');
                $expr = Token::skipWhitespace($expr->next);
            } else {
                throw new \LogicException("Syntax Error for #defined expression, expecting ( or IDENTIFIER, found " . $expr->value);
            }
        } elseif ($expr->type === Token::IDENTIFIER) {
            $next = Token::skipWhitespace($expr->next);
            if ($next !== null && $next->value === '(') {
                // This is a call!!!
                $toCall = $expr->value;
                $expr = $next->next;
                $args = [];
                while ($expr !== null && $expr->value !== ')') {
                    list ($arg, $expr) = $this->evaluateInternal($expr, false);
                    $args[] = $arg;
                    if ($expr !== null && $expr->value === ',') {
                        $expr = Token::skipWhitespace($expr->next);
                    }
                }
                if ($expr === null) {
                    throw new \LogicException('Unexpected end of line, expected ) to close call');
                }
                $expr = Token::skipWhitespace($expr->next);
                $result = Token::skipWhitespace($this->doCall($toCall, ...$args));
            } elseif ($this->isDefined($expr->value)) {
                $result = Token::skipWhitespace($this->expand($expr->value));
                $expr = Token::skipWhitespace($expr->next);
            } else {
                $result = new Token(Token::IDENTIFIER, $expr->value, 'computed');
                $expr = Token::skipWhitespace($expr->next);
            }
        } elseif ($expr->type === Token::PUNCTUATOR && $expr->value === '!') {
            $negate = true;
            $expr = Token::skipWhitespace($expr->next);
            goto restart;
        } elseif ($expr->type === Token::NUMBER) {
            $result = new Token(Token::NUMBER, $expr->value, 'computed');
            $expr = Token::skipWhitespace($expr->next);
        } else {
            throw new \LogicException('Unknown operator ' . $expr->value);
        }
        if ($negate) {
            if ($result->type === Token::NUMBER) {
                $result = new Token(Token::NUMBER, $result->value === '0' ? '1' : '0', 'computed');
            } else {
                throw new \LogicException('Unknown how to negate result type: ' . $result->value);
            }
        }

        if ($single) {
            return [$result, $expr];
        }
result:
        if (is_null($expr)) {
            return [$result, null];
        }
        if (is_null($result)) {
            // Since there's more, default null to 0
            $result = new Token(Token::NUMBER, '0', 'computed');
        }
        if ($expr->value === '|' && $expr->next !== null && $expr->next->value === '|') {
            // OR combinator
            $expr = Token::skipWhitespace($expr->next->next);
            list ($right, $expr) = $this->evaluateInternal($expr);
            if ($result->type === Token::NUMBER && $result->value !== '0') {
                // don't care about right
                goto result;
            } else {
                $result = $right;
                goto result;
            }
        } elseif ($expr->value === '&' && $expr->next !== null && $expr->next->value === '&') {
            // AND combinator
            $expr = Token::skipWhitespace($expr->next->next);
            list ($right, $expr) = $this->evaluateInternal($expr);
            if ($result->type === Token::NUMBER && $result->value === '0') {
                // don't care about right
                goto result;
            } else {
                $result = $right;
                goto result;
            }
        } elseif ($expr->value === ',') {
            // , is used in args lists, and are parsed recursively
            return [$result, $expr];
        } elseif ($expr->value === ')') {
            // () are handled recursively, try returning
            return [$result, $expr];
        } elseif ($expr->value === '>') {
            if ($expr->next !== null && $expr->next->value === '=') {
                // >=
                list ($right, $expr) = $this->evaluateInternal($expr->next->next, true);
                $result = new Token(Token::NUMBER, $this->normalize($result) >= $this->normalize($right) ? '1' : '0', 'computed');
                goto result;
            }
            list ($right, $expr) = $this->evaluateInternal($expr->next, true);
            $result = new Token(Token::NUMBER, $this->normalize($result) > $this->normalize($right) ? '1' : '0', 'computed');
            goto result;
        } elseif ($expr->value === '<') {
            if ($expr->next !== null && $expr->next->value === '=') {
                // >=
                list ($right, $expr) = $this->evaluateInternal($expr->next->next, true);
                $result = new Token(Token::NUMBER, $this->normalize($result) <= $this->normalize($right) ? '1' : '0', 'computed');
                goto result;
            }
            list ($right, $expr) = $this->evaluateInternal($expr->next, true);
            $result = new Token(Token::NUMBER, $this->normalize($result) < $this->normalize($right) ? '1' : '0', 'computed');
            goto result;
        } elseif ($expr->value === '=' && $expr->next !== null && $expr->next->value === '=') {
            list ($right, $expr) = $this->evaluateInternal($expr->next->next, true);
            $result = new Token(Token::NUMBER, $this->normalize($result) === $this->normalize($right) ? '1' : '0', 'computed');
            goto result;
        } elseif ($expr->value === '-') {
            list ($right, $expr) = $this->evaluateInternal($expr->next, true);
            $result = new Token(Token::NUMBER, (string) ($this->normalize($result) - $this->normalize($right)), 'computed');
            goto result;
        } elseif ($expr->value === '+') {
            list ($right, $expr) = $this->evaluateInternal($expr->next, true);
            $result = new Token(Token::NUMBER, (string) ($this->normalize($result) + $this->normalize($right)), 'computed');
            goto result;
        } elseif ($expr->value === '?') {
            // Ternary
            list ($if, $expr) = $this->evaluateInternal($expr->next, true);
            if ($expr === null || $expr->value !== ':' || $expr->next === null) {
                throw new \LogicException('Syntax Error: expecting ": EXPR" in ternary expression');
            }
            list ($else, $expr) = $this->evaluateInternal($expr->next, true);
            $result = $this->normalize($result) === 0 ? $else : $if;
            goto result;
        } elseif ($expr->type === Token::LITERAL) {
            // check prior operator
            if ($result->type === Token::IDENTIFIER && $result->value === 'L') {
                $result = new Token(Token::NUMBER, (string) ord($expr->value), 'computed');
                $expr = Token::skipWhitespace($expr->next);
                goto result;
            }
            // fallthrough intentional
        }
        throw new \LogicException("Unknown token to evaluate: {$expr->type} with value " . var_export($expr->value, true) . " in {$expr->file}");
    }

    private function count(?Token $expr): int {
        $count = 0;
        while (!empty($expr)) {
            $count++;
            $expr = Token::skipWhitespace($expr->next);
        }
        return $count;
    }

    private function normalize(Token $expr): int {
        if ($expr->type !== Token::NUMBER) {
            return 0;
        }
        $str = $expr->value;
        $result = 0;
        $length = strlen($str);
        $base = 10;
        $idx = 0;
        $negate = false;
        $values = [
            '0' => 0, '1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8,
            '9' => 9, 'a' => 10, 'A' => 10, 'b' => 11, 'B' => 11, 'c' => 12, 'C' => 12, 'd' => 13,
            'D' => 13, 'e' => 14, 'E' => 14, 'f' => 15, 'F' => 15
        ];
        if ($length > 1 && $str[0] === '0') {
            $base = 8;
            $idx = 1;
        }
        if ($length > 2 && $str[0] === '0' && ($str[1] === 'x' || $str[1] === 'X')) {
            $base = 16;
            $idx = 2;
        }
        while ($idx < $length) {
            if (isset($values[$str[$idx]])) {
                $chr = $values[$str[$idx]];
                if ($chr >= $base) {
                    throw new \LogicException("Base mismatch for {$str}, found $chr for $idx");
                }
                $result = ($result * $base) + $chr;
            } elseif ($str[$idx] === 'L') {
                // indicates number is a long, return as is
                if ($idx + 1 !== $length) {
                    throw new \LogicException('Trailing characters after type indicator: ' . $str);
                }
            } elseif ($str[$idx] === '-') {
                $negate = !$negate;
            } else {
                throw new \LogicException("Unknown number token provided in '$str' " . $str[$idx]);
            }
            $idx++;
        }
        if ($negate) {
            return -1 * $result;
        }
        return $result;
    }

    public function doCall(string $toCall, ?Token ...$args): Token {
        $token = $this->expand($toCall);
        if ($token === null) {
            return new Token(Token::NUMBER, '0', 'computed');
        }
        $argMap = [];
        $argIdx = 0;
        if ($token->value === '(') {
            $token = Token::skipWhitespace($token->next);
            while ($token !== null && $token->value !== ')') {
                if ($token->type !== Token::IDENTIFIER) {
                    throw new \LogicException('Unexpected argument found, expecting IDENTIFIER found ' . $token->value);
                } elseif (!array_key_exists($argIdx, $args)) {
                    var_dump($args);
                    throw new \LogicException("Unexpected argument count, $toCall expects at least " . ($argIdx + 1) . " arguments, " . count($args) . " found");
                }
                $argMap[$token->value] = $args[$argIdx++];
                $token = Token::skipWhitespace($token->next);
                if ($token !== null && $token->value === ',') {
                    $token = Token::skipWhitespace($token->next);
                }
            }
            if ($token === null) {
                throw new \LogicException('Unexpected end of definition for ' . $toCall . ', expecting )');
            }
            $token = $token->next;
        }
        if ($token === null) {
            return new Token(Token::OTHER, '', 'computed');
        }
        // Copy token stream
        $first = $newToken = new Token(0, '', 'internal');
        while ($token !== null) {
            if ($token->type === Token::IDENTIFIER && array_key_exists($token->value, $argMap)) {
                $arg = $argMap[$token->value];
                $toAdd = $toAddNext = new Token(Token::OTHER, '', 'computed');
                while ($arg !== null) {
                    $toAddNext = $toAddNext->next = new Token($arg->type, $arg->value, $arg->file);
                    $arg = $arg->next;
                }
                $newToken->next = $toAdd->next === null ? $toAdd : $toAdd->next;
                $newToken = $newToken->tail();
                goto nexttoken;
            } else {
                $newToken->next = new Token($token->type, $token->value, $token->file);
            }
            $newToken = $newToken->next;
nexttoken:
            $token = $token->next;
        }
        return $first->next;
    }

}
