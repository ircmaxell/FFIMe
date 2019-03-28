<?php

declare(strict_types=1);

namespace FFIMe;

use PHPCParser\CParser;
use PHPCParser\Node\Decl;

class FFIMe {

    const TYPES_TO_REMOVE = [
        'void',
        'char',
        'bool',
        'int8_t',
        'uint8_t',
        'int16_t',
        'uint16_t',
        'int32_t',
        'uint32_t',
        'int64_t',
        'uint64_t',
        'float',
        'double',
        'uintptr_t',
        'intptr_t',
        'size_t',
        'ssize_t',
        'ptrdiff_t',
        'off_t',
        'va_list',
        '__builtin_va_list',
        '__gnuc_va_list',
    ];

    const RECORDS_TO_REMOVE = [
        '_IO_FILE_plus',
    ];

    const VARS_TO_REMOVE = [
        '_IO_2_1_stdin_',
        '_IO_2_1_stdout_',
        '_IO_2_1_stderr_',
        'sys_errlist', // sigh to FFI
    ];

    const FUNCTIONS_TO_REMOVE = [

    ];

    private string $sofile;

    private string $code = '';

    private array $ast = [];
    private array $numericDefines = [];

    private Compiler $compiler;

    private \FFI $ffi;
    private bool $built = false;

    const DEFAULT_SO_SEARCH_PATHS = [
        '/usr/local/lib',
        '/usr/lib',
    ];

    public function __construct(string $sharedObjectFile, array $headerSearchPaths = [], array $soSearchPaths = self::DEFAULT_SO_SEARCH_PATHS) {
        $this->sofile = $this->findSOFile($sharedObjectFile, $soSearchPaths);
        $this->cparser = new CParser;
        foreach ($headerSearchPaths as $path) {
            $this->cparser->addSearchPath($path);
        }
        $this->compiler = new Compiler;
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
        $this->ast = array_merge($this->ast, $this->filterDeclarations($this->cparser->parse($header)->declarations));
        $this->numericDefines = array_merge($this->numericDefines, $this->cparser->getLastContext()->getNumericDefines());
        return $this;
    }

    public function getCode(): string {
        return $this->code;
    }

    public function codeGen(string $classname, string $filename): void {
        file_put_contents($filename, '<?php ' . $this->compiler->compile($this->sofile, $this->ast, $this->numericDefines, $classname));
    }

    public function build() {
        if ($this->built) {
            return $this;
        }
        $code = $this->compiler->compile($this->sofile, $this->ast, $this->numericDefines, 'A\B\C');
        eval($code);
        return new \A\B\C;
        var_dump($code);
        die();
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

    protected function filterDeclarations(array $declarations): array {
        $result = [];
        foreach ($declarations as $declaration) {
            if ($declaration instanceof Decl\NamedDecl\TypeDecl\TypedefNameDecl\TypedefDecl) {
                if (!in_array($declaration->name, self::TYPES_TO_REMOVE)) {
                    $result[] = $declaration;
                }
            } elseif ($declaration instanceof Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl) {
                if (!in_array($declaration->name, self::RECORDS_TO_REMOVE)) {
                    $result[] = $declaration;
                }
            } elseif ($declaration instanceof Decl\NamedDecl\ValueDecl\DeclaratorDecl\FunctionDecl) {
                if ($declaration->stmts === null) {
                    // only declarations, not definitions
                    if (substr($declaration->name, 0, 2) !== '__' && !in_array($declaration->name, self::FUNCTIONS_TO_REMOVE)) {
                        // Skip __ functions
                        $result[] = $declaration;
                    }
                }
            } elseif ($declaration instanceof Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl) {
                if (!in_array($declaration->name, self::VARS_TO_REMOVE)) {
                    $result[] = $declaration;
                }
            } elseif ($declaration instanceof Decl\NamedDecl\TypeDecl\TagDecl\EnumDecl) {
                $result[] = $declaration;
            } else {
                throw new \LogicException('Unknown declaration type to skip/ignore: ' . get_class($declaration));
            }
        }
        return $result;
    }
}