<?php

declare(strict_types=1);

namespace FFIMe;

class Context {
    private array $definitions = [];

    public function define(string $identifier, ?Token $token): void {
        $this->definitions[$identifier] = $token;
    }

    public function undefine(string $identifier): void {
        unset($this->definitions[$identifier]);
    }

    public function isDefined(string $identifier): bool {
        return isset($this->definitions[$identifier]);
    }

    public function expand(string $identifier): ?Token {
        if (!$this->isDefined($identifier)) {
            return [];
        }
        return $this->definitions[$identifier];
    }

    public function getValue(string $identifier): mixed {
        return $this->evaluate($this->expand($identifier));
    }

    public function evaluate(?Token $expr): Token {
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
            return $expr[0];
        }


        var_dump($expr);
    }

    private function count(?Token $expr): int {
        $count = 0;
        while (!empty($expr)) {
            $count++;
            $expr = $expr->next;
        }
        return $count;
    }


}
