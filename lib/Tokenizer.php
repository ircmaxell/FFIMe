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
                $buffer = $char;
                while ($pos < $length && ($line[$pos] === ' ' || $line[$pos] === "\t" || $line[$pos] === "\0")) {
                    $buffer .= $line[$pos++];
                }
                $result = $result->next = new Token(Token::WHITESPACE, $buffer, $file);
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
            } elseif ($char === "'") {
                $buffer = '';
                while ($pos < $length) {
                    $char = $line[$pos++];
                    if ($char === "'") {
                        break;
                    } elseif ($char === '\\' && $pos < $length) {
                        // eat both characters since it's an escape
                        $char = $line[$pos++];
                        $buffer .= '\\' . $char;
                    } else {
                        $buffer .= $char;
                    }
                }
                $value = chr(0);
                if (strlen($buffer) > 1 && $buffer[0] === '\\') {
                    // convert character into integer
                    switch ($buffer[1]) {
                        case '0':
                            $value = chr(0);
                            break;
                        case 'x':
                            $value = chr(intval(substr($buffer, 2), 16));
                            break;
                        default: 
                            throw new \LogicException("Unknown character literal escape sequence: " . var_export($buffer, true));
                    }
                } elseif (strlen($buffer) === 1) {
                    $value = $buffer;
                } else {
                    throw new \LogicException("Syntax error: unexpected illegal string literal found '$buffer' in $file at position $pos");
                }
                $result = $result->next = new Token(Token::LITERAL, $value, $file);
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

