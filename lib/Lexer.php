<?php

namespace FFIMe;

use FFIMe\Node;

class Lexer
{

    private array $tokens;
    private int $tokenPos = -1;
    private ?Token $currentToken = null;
    private array $toEmit = [];
    private Scope $scope;

    public function begin(Scope $scope, array $tokens): void {
        $this->tokens = $tokens;
        $this->tokenPos = -1;
        $this->currentToken = null;
        $this->toEmit = [];
        $this->scope = $scope;
    }

    public function getNextToken(&$value = null, &$startAttributes = null, &$endAttributes = null): int {
        $startAttributes = [];
        $endAttributes   = [];

        while(true) {
            if ($this->currentToken === null) {
                if (!isset($this->tokens[++$this->tokenPos])) {
                    $token = "\0";
                } else {
                    $this->currentToken = $this->tokens[$this->tokenPos];
                    continue;
                }
            } else {
                $token = $this->extractToken();
            }

            if (is_string($token)) {
                $id = ord($token);
                $value = $token;
            } else {
                $value = $token[1];
                $id = $token[0];
            }
            return $id;
        }
        throw new \LogicException("Reached the end of lexer loop, should never happen");
    }

    private function extractToken(): array {
restart:
        if ($this->currentToken->type === Token::IDENTIFIER) {
            return $this->extractIdentifier();
        } elseif ($this->currentToken->type === Token::NUMBER) {
            return $this->extractNumber();
        } elseif ($this->currentToken->type === Token::LITERAL) {
            return $this->extractLiteral();
        } elseif ($this->currentToken->type === Token::PUNCTUATION) {
            return $this->extractPunctuation();
        } elseif ($this->currentToken->type === Token::WHITESPACE) {
            $this->currentToken = $this->currentToken->next;
            goto restart;
        } elseif ($this->currentToken->type === Token::OTHER) {
            return $this->extractOther();
        }
        throw new \LogicException("Unknown token type encountered: {$this->currentToken->type}");
    }

    private function extractPunctuation(): array {

    }

    private const IDENTIFIER_MAP = [
        'auto' => CTokens::T_AUTO,
        'break' => CTokens::T_BREAK,
        'case' => CTokens::T_CASE,
        'char' => CTokens::T_CHAR,
        'const' => CTokens::T_CONST,
        'continue' => CTokens::T_CONTINUE,
        'default' => CTokens::T_DEFAULT,
        'do' => CTokens::T_DO,
        'double' => CTokens::T_DOUBLE,
        'else' => CTokens::T_ELSE,
        'enum' => CTokens::T_ENUM,
        'extern' => CTokens::T_EXTERN,
        'float' => CTokens::T_FLOAT,
        'for' => CTokens::T_FOR,
        'goto' => CTokens::T_GOTO,
        'if' => CTokens::T_IF,
        'inline' => CTokens::T_INLINE,
        'int' => CTokens::T_INT,
        'long' => CTokens::T_LONG,
        'register' => CTokens::T_REGISTER,
        'restrict' => CTokens::T_RESTRICT,
        'return' => CTokens::T_RETURN,
        'short' => CTokens::T_SHORT,
        'signed' => CTokens::T_SIGNED,
        'sizeof' => CTokens::T_SIZEOF,
        'static' => CTokens::T_STATIC,
        'struct' => CTokens::T_STRUCT,
        'switch' => CTokens::T_SWITCH,
        'typedef' => CTokens::T_TYPEDEF,
        'union' => CTokens::T_UNION,
        'unsigned' => CTokens::T_UNSIGNED,
        'void' => CTokens::T_VOID,
        'volatile' => CTokens::T_VOLATILE,
        'while' => CTokens::T_WHILE,
        '_alignas' => CTokens::T_ALIGNAS,
        '_alignof' => CTokens::T_ALIGNOF,
        '_atomic' => CTokens::T_ATOMIC,
        '_bool' => CTokens::T_BOOL,
        '_complex' => CTokens::T_COMPLEX,
        '_generic' => CTokens::T_GENERIC,
        '_imaginary' => CTokens::T_IMAGINARY,
        '_noreturn' => CTokens::T_NORETURN,
        '_static_assert' => CTokens::T_STATIC_ASSERT,
        '_thread_local' => CTokens::T_THREAD_LOCAL,
        '__func__' => CTokens::T_FUNC_NAME,
    ];

    private function extractIdentifier(): array {
        $tok = $this->currentToken;
        $this->currentToken = $this->currentToken->next;

        $lowerToken = strtolower($tok->value);
        if (isset(self::IDENTIFIER_MAP[$lowerToken])) {
            return [self::IDENTIFIER_MAP[$lowerToken], $tok->value];
        }
        return [$this->scope->lookup($tok->value), $tok->value];
    }
}