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

    public function compile(string $header): string {
        $tokens = $this->preprocessor->process($header);
        $tokens = $this->expandMacros($tokens);
        return $this->emit($tokens);
    }

    private function emit(array $tokens): string {
        $result = '';
        foreach ($tokens as $line) {
            foreach ($line as $token) {
                if ($token->type === Token::LITERAL) {
                    $result .= '"' . $token->value . '"';
                } else {
                    $result .= ' ' . $token->value;
                }
            }
            $result .= "\n";
        }
        return $result;
    }

    private function expandMacros(array $tokens): array {
        do {
            $tokenPos = 0;
            $numberOfTokens = count($tokens);
            $result = [];
            $rerun = false;
            while ($tokenPos < $numberOfTokens) {
                $line = $tokens[$tokenPos++];
                $resultLine = [];

                $linePos = 0;
                $lineLength = count($line);
                while ($linePos < $lineLength) {
                    $token = $line[$linePos++];
                    if ($token->type === Token::IDENTIFIER) {
                        if ($this->context->isDefined($token->value)) {
                            $resultLine = array_merge($resultLine, $this->context->expand($token->value));
                            $rerun = true;
                        } else {
                            // emit token directly
                            $resultLine[] = $token;
                        }
                    } else {
                        $resultLine[] = $token;
                    }
                }
                $result[] = $resultLine;
            }
            $tokens = $result;
        } while ($rerun);
        return $tokens;
    }

}