<?php

declare(strict_types=1);

namespace FFIMe;

class Parser {

    private Tokenizer $tokenizer;

    public function __construct(Tokenizer $tokenizer = null) {
        $this->tokenizer = $tokenizer ?? new Tokenizer;
    }

    public function parse(string $file, string $code): array {
        $lines = preg_split("(\n|\r|\r\n)", $code);
        $lines = $this->mergeContinuedLines($lines);
        $lines = $this->stripComments($lines);
        $tokens = $this->tokenizer->tokenize($file, ...$lines);
        return $tokens;
    }

    private function mergeContinuedLines(array $lines): array {
        $result = [];
        $pos = 0;
        $length = count($lines);

        while ($pos < $length) {
            $buffer = $lines[$pos++];
            while (substr($buffer, -1) === '\\') {
                $buffer = substr($buffer, 0, -1);
                if ($pos < $length) {
                    $buffer .= $lines[$pos++];
                } else {
                    break;
                }
            }
            $result[] = $buffer;
        }
        return $result;
    }

    private function stripComments(array $lines): array {
        $result = [];
        $pos = 0;
        $length = count($lines);

        while ($pos < $length) {
            $buffer = $lines[$pos++];
            if (strpos($buffer, '//') === false && strpos($buffer, "/*") === false) {
                $result[] = $buffer;
                continue;
            }
            $subbuffer = '';
            $i = 0;
            $lineLength = strlen($buffer);
            while ($i < $lineLength) {
                $char = $buffer[$i++];
                if ($char === '/' && $i < $lineLength) {
                    if ($buffer[$i] === '/') {
                        // Single line comment: kill entire line from here out
                        break;
                    } elseif ($buffer[$i] === '*') {
                        // Consume until we find a */
                        $i++;
                        while (true) {
                            if ($i >= $lineLength) {
                                if ($pos < $length) {
                                    $buffer = $lines[$pos++];
                                    $i = 0;
                                    $lineLength = strlen($buffer);
                                    continue;
                                    // Continue to handle empty lines gracefully
                                } else {
                                    // syntax error, unterminated /*
                                    throw new \RuntimeException("Unterminated /*");
                                }
                            }
                            $char = $buffer[$i++];
                            if ($char === '*' && $i < $lineLength && $buffer[$i] === '/') {
                                // Found */
                                $i++;
                                break;
                            } 
                        }
                    } else {
                        $subbuffer .= $char;
                    }
                } elseif ($char === '"') {
                    // Todo: handle string literals
                    $subbuffer .= $char;
                    // Consume until we find an unescaped "
                    while (true) {
                        if ($i >= $lineLength) {
                            if ($pos < $length) {
                                $buffer = $lines[$pos++];
                                $i = 0;
                                $lineLength = strlen($buffer);
                                continue;
                            } else {
                                throw new \RuntimeException("Unterminated \"");
                            }
                        }
                        $char = $buffer[$i++];
                        if ($char === '\\') {
                            $subbuffer .= $char;
                            if ($i < $lineLength) {
                                // Be sure to eat escaped character
                                $subbuffer .= $buffer[$i++];
                            }
                        } elseif ($char === '"') {
                            // terminating "
                            $subbuffer .= $char;
                            break;
                        } else {
                            $subbuffer .= $char;
                        }
                    }
                } else {
                    $subbuffer .= $char;
                }
            }
            $result[] = $subbuffer;
        }
        return $result;
    }
}