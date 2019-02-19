<?php

declare(strict_types=1);

namespace FFIMe;

class Tokenizer {


    /**
     * @return Token[][]
     */
    public function tokenize(string $file, string ...$lines): array {
        $result = [];
        foreach ($lines as $line) {
            $result[] = $this->tokenizeLine($file, $line);
        }
        return $result;
    }

    protected function tokenizeLine(string $file, string $line): ?Token {
        $result = $first = new Token(0, '', $file);
        $length = strlen($line);
        $pos = 0;
        while ($pos < $length) {
            $char = $line[$pos++];
            if (ctype_alpha($char) || $char === '_') {
                // identifier
                $buffer = $char;
                while ($pos < $length && (ctype_alnum($line[$pos]) || $line[$pos] === '_')) {
                    $buffer .= $line[$pos++];
                }
                $result = $result->next = new Token(Token::IDENTIFIER, $buffer, $file);
            } elseif ($char === ' ' || $char === "\t" || $char === "\0") {
                // white space, ignore
            } elseif (ctype_digit($char) || ($char === '.' && $pos < $length && ctype_digit($line[$pos]))) {
                // Numeric literal
                $buffer = $char;
                while ($pos < $length) {
                    $char = $line[$pos];
                    if ($char === 'e' || $char === 'E' || $char === 'p' || $char === 'P') {
                        $buffer .= $char;
                        $pos++;
                        if ($pos < $length && ($line[$pos] === '-' || $line[$pos] === '+')) {
                            // emit both
                            $buffer .= $line[$pos++];
                        }
                    } elseif (ctype_alnum($char) || $char === '.' || $char === '_') {
                        $buffer .= $char;
                        $pos++;
                    } else {
                        break;
                    }
                }
                $result = $result->next = new Token(Token::NUMBER, $buffer, $file);
            } elseif ($char === '"') {
                $buffer = '';
                while ($pos < $length) {
                    $char = $line[$pos++];
                    if ($char === '"') {
                        break;
                    } elseif ($char === '\\' && $pos < $length) {
                        // eat both characters since it's an escape
                        $char = $line[$pos++];
                        $buffer .= '\\' . $char;
                    } else {
                        $buffer .= $char;
                    }
                }
                $result = $result->next = new Token(Token::LITERAL, $buffer, $file);
            } elseif (ctype_punct($char)) {
                if ($char === '.' && $pos + 1 < $length && $line[$pos] === '.' && $line[$pos + 1] === '.') {
                    // special case for ... token
                    $result = $result->next = new Token(Token::PUNCTUATOR, '...', $file);
                    $pos = $pos + 2;
                } elseif ($char === '@' || $char === '$' || $char === '`') {
                    $result = $result->next = new Token(Token::OTHER, $char, $file);
                } elseif ($char === '#' && $pos < $length && $line[$pos] === '#') {
                    $result = $result->next = new Token(Token::PUNCTUATOR, '##', $file);
                    $pos++;
                } elseif ($char === '<' && $pos < $length && $line[$pos] === '%') {
                    // Digraph
                    $result = $result->next = new Token(Token::PUNCTUATOR, '{', $file);
                    $pos++;
                } elseif ($char === '%' && $pos < $length && $line[$pos] === '>') {
                    // Digraph
                    $result = $result->next = new Token(Token::PUNCTUATOR, '}', $file);
                    $pos++;
                } elseif ($char === '<' && $pos < $length && $line[$pos] === ':') {
                    // Digraph
                    $result = $result->next = new Token(Token::PUNCTUATOR, '[', $file);
                    $pos++;
                } elseif ($char === ':' && $pos < $length && $line[$pos] === '>') {
                    // Digraph
                    $result = $result->next = new Token(Token::PUNCTUATOR, ']', $file);
                    $pos++;
                } elseif ($char === '%' && $pos + 2 < $length && $line[$pos] === ':' && $line[$pos + 1] === '%' && $line[$pos + 2] === ':') {
                    // Digraph
                    $result = $result->next = new Token(Token::PUNCTUATOR, '##', $file);
                    $pos = $pos + 3;
                } elseif ($char === '%' && $pos < $length && $line[$pos] === ':') {
                    // Digraph
                    $result = $result->next = new Token(Token::PUNCTUATOR, '#', $file);
                    $pos++;
                } else {
                    $result = $result->next = new Token(Token::PUNCTUATOR, $char, $file);
                }
            } else {
                var_dump($char, ord($char), ord("\n"));
                die("Unknown Character");
            }
        }
        return $first->next;
    }


}

class Token {
    const IDENTIFIER = 1;
    const NUMBER = 2;
    const LITERAL = 3;
    const PUNCTUATOR = 4;
    const OTHER = 5;

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
}