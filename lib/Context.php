<?php

declare(strict_types=1);

namespace FFIMe;

class Context {
    private array $definitions = [];

    public function define(string $identifier, array $tokens): void {
        $this->definitions[$identifier] = $tokens;
    }

    public function undefine(string $identifier): void {
        unset($this->definitions[$identifier]);
    }

    public function isDefined(string $identifier): bool {
        return isset($this->definitions[$identifier]);
    }

    public function expand(string $identifier): array {
        if (!$this->isDefined($identifier)) {
            return [];
        }
        return $this->definitions[$identifier];
    }

    public function getValue(string $identifier): mixed {
        return $this->evaluate(...$this->expand($identifier));
    }

    public function evaluate(Token ...$expr): Token {
        if (empty($expr)) {
            return new Token(Token::NUMBER, '0', 'computed');
        } elseif (count($expr) === 1) {
            // special case
            switch ($expr[0]->type) {
                case Token::IDENTIFIER:
                    if ($this->isDefined($expr[0]->value)) {
                        return $this->evaluate(...$this->definitions[$expr[0]->value]);
                    }
                    return new Token(Token::NUMBER, '0', 'computed');
            }
            return $expr[0];
        }


        var_dump($expr);
    }


}
