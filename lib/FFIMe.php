<?php

declare(strict_types=1);

namespace FFIMe;

class FFIMe {

    private string $sofile;

    private string $code = '';

    private Context $context;
    private Compiler $compiler;

    private \FFI $ffi;
    private bool $built = false;

    

    const DEFAULT_SO_SEARCH_PATHS = [
        '/usr/local/lib',
        '/usr/lib',
    ];

    public function __construct(string $sharedObjectFile, array $headerSearchPaths = [], array $soSearchPaths = self::DEFAULT_SO_SEARCH_PATHS) {
        $this->context = new Context($headerSearchPaths);
        $this->sofile = $this->findSOFile($sharedObjectFile, $soSearchPaths);
        $this->compiler = new Compiler($this->context);
    }

    public function __get(string $name) {
        if ($this->context->isDefined($name)) {
            return $this->context->getValue($name);
        }
        return $this->ffi->$name;
    }

    public function __call(string $name, array $args) {
        switch (count($args)) {
            case 2:
                return $this->ffi->$name($args[0], $args[1]);
            default:
                return $this->ffi->$name(...$args);
        }
    }

    public function stringToCData(string $data): \FFI\CData {
        $length = strlen($data) + 1;
        $string = $this->ffi->new('char[' . $length . ']');
        \FFI::memcpy($string, $data, $length - 1);
        $string[$length - 1] = 0;
        return $string;
    }

    public function defineInt(string $identifier, int $value): void {
        $this->context->define($identifier, [new Token(Token::NUMBER, (string) $value, 'php')]);
    }

    public function defineIdentifier(string $identifier, string $value): void {
        $this->context->define($identifier, [new Token(Token::IDENTIFIER, $value, 'php')]);
    }

    public function defineString(string $identifier, string $value): void {
        $this->context->define($identifier, [new Token(Token::LITERAL, $value, 'php')]);
    }

    public function include(string $header): self {
        if ($this->built) {
            throw new \RuntimeException("Already built, cannot include twice");
        }
        $tokens = $this->compiler->compile($header);
        $this->code .= $this->compiler->emit($tokens);
        return $this;
    }

    public function getCode(): string {
        return $this->code;
    }

    public function build(): self {
        if ($this->built) {
            return $this;
        }
        $this->ffi = \FFI::cdef($this->code, $this->sofile);
        $this->built = true;
        return $this;
    }
    
    private function findSOFile(string $filename, array $searchPaths): string {
        if (is_file($filename)) {
            // no searching needed
            return $filename; 
        }
        foreach ($searchPaths as $path) {
            $test = $path . '/' . $filename;
            if (file_exists($test)) {
                return $test;
            }
        }
        throw new \LogicException('Could not find shared object file ' . $filename);
    }
}