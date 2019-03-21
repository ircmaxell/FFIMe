<?php

declare(strict_types=1);

namespace FFIMe;

class Token {
    const IDENTIFIER = 1;
    const NUMBER = 2;
    const LITERAL = 3;
    const PUNCTUATOR = 4;
    const WHITESPACE = 5;
    const OTHER = 6;

    public int $type;
    public string $value;
    public string $file;
    public ?Token $next;

    public function __construct(int $type, string $value, string $file, ?Token $next = null) {
        $this->type = $type;
        $this->value = $value;
        $this->file = $file;
        $this->next = $next;
    }

    public function tail(): self {
        $node = $this;
        while (!is_null($node->next)) {
            $node = $node->next;
        }
        return $node;
    }

    public static function skipWhitespace(?self $node): ?self {
        while ($node !== null && $node->type === self::WHITESPACE) {
            $node = $node->next;
        }
        return $node;
    }

}