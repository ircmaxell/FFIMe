<?php

declare(strict_types=1);

namespace FFIMe;

class Compiler {

    private PreProcessor $preprocessor;
    private Context $context;

    public function __construct(Context $context = null, PreProcessor $preprocessor = null) {
        $this->context = $context ?? new Context;
        $this->preprocessor = $preprocessor ?? new PreProcessor($this->context);
    }

    public function compile(string $header): array {
        $tokens = $this->preprocessor->process($header);
        $tokens = $this->expandMacros($tokens);
        $tokens = $this->normalizeLines($tokens);
        return $tokens;
    }

    private function normalizeLines(array $tokens): array {
        $result = [];
        $length = count($tokens);
        $i = 0;
        while ($i < $length) {
            $line = $tokens[$i++];
            if (empty($line)) {
                continue;
            }
            $head = $prev = $line;
            do {
                // find next ';'
                while (!is_null($line)) {
                    if ($line->type === Token::PUNCTUATOR && $line->value === ';') {
                        $result[] = $head;
                        $old = $line;
                        $head = $line = $line->next;
                        $prev = $old->next = null;
                    } else {
                        $prev = $line;
                        $line = $line->next;
                    }
                }
                if (!is_null($head)) {
                    // spanning lines
                    while ($i < $length) {

                        $newline = $tokens[$i++];
                        if (empty($newline)) {
                            continue;
                        }
                        if (!is_null($prev)) {
                            $prev->next = $newline;
                        }
                        $line = $newline;
                        break;
                    }
                    if (empty($line)) {
                        throw new \LogicException("Syntax error: missing ;");
                    }
                } else {
                    break;
                }
            } while(true);
        }
        return $result;
    }

    public function emit(array $tokens): string {
        $result = '';
        foreach ($tokens as $line) {
            while (!is_null($line)) {
                if ($line->type === Token::LITERAL) {
                    $result .= '"' . $line->value . '"';
                } elseif ($line->type === Token::IDENTIFIER && $line->value === 'const') {
                    //pass (don't emit consts)
                } else {
                    $result .= ' ' . $line->value;
                }
                $line = $line->next;
            }
            $result .= "\n";
        }
        return $result;
    }

    private function expandMacros(array $lines): array {
        do {
            $linePos = 0;
            $numberOfLines = count($lines);
            $result = [];
            $rerun = false;
            while ($linePos < $numberOfLines) {
                $line = $lines[$linePos++];
                $resultLine = $first = new Token(0, '', 'internal');

                while (!empty($line)) {
                    if ($line->type === Token::IDENTIFIER) {
                        if ($this->context->isDefined($line->value)) {
                            $tmp = $this->context->expand($token->value);
                            $resultLine->next = $tmp;
                            $resultLine = $tmp->tail();
                        } else {
                            $resultLine = $resultLine->next = $line;
                        }
                    } else {
                        $resultLine = $resultLine->next = $line;
                    }
                    $line = $line->next;
                }
                $result[] = $first->next;
            }
            $lines = $result;
        } while ($rerun);
        return $lines;
    }

}