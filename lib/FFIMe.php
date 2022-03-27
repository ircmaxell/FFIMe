<?php

declare(strict_types=1);

namespace FFIMe;

use PHPCParser\Context;
use PHPCParser\CParser;
use PHPCParser\Node\Decl;
use PHPELFSymbolResolver\Parser as ElfParser;


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

    private array $code = [];

    private array $ast = [];
    private array $numericDefines = [];
    private array $definitionAst = [];

    private Compiler $compiler;
    private Context $context;
    private CParser $cparser;
    
    private array $symbols;

    private \FFI $ffi;
    private bool $built = false;

    const DEFAULT_SO_SEARCH_PATHS = [
        '/usr/local/lib',
        '/usr/lib',
    ];

    public function __construct(string $sharedObjectFile, array $headerSearchPaths = [], array $soSearchPaths = self::DEFAULT_SO_SEARCH_PATHS) {
        $this->sofile = $this->findSOFile($sharedObjectFile, $soSearchPaths);
        $this->context = new Context($headerSearchPaths);
        $this->cparser = new CParser;
        $this->compiler = new Compiler;
        $this->symbols = array_flip((new ElfParser)->parse($this->sofile)->getAllSymbols());

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
        $this->filterDeclarations($this->cparser->parse($header, $this->context)->declarations);
        return $this;
    }

    public function warning(string $message) {
        echo "[Warning] $message\n";
    }

    public function getCode(): string {
        return $this->code;
    }

    public function codeGen(string $className, string $filename): void {
        $this->filterSymbolDeclarations();
        $this->compile($className);
        file_put_contents($filename, '<?php ' . $this->code[$className]);
    }

    public function build(?string $className = null) {
        $className = $className ?? $this->getDynamicClassName();
        $this->filterSymbolDeclarations();
        $this->compile($className);
        eval($this->code[$className]);
        return new $className;
    }

    public function getDynamicClassName(): string {
        $class = 'ffime\ffime_';
        do {
            $class .= mt_rand(0, 99);
        } while (class_exists($class));
        return $class;
    }

    public function compile($className): void {
        if (isset($this->code[$className])) {
            return;
        }
        $this->numericDefines = $this->context->getNumericDefines();
        $this->code[$className] = $this->compiler->compile($this->sofile, $this->ast, $this->definitionAst, $this->numericDefines, $className);
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

    protected function filterSymbolDeclarations(): void {
        $result = [];
        foreach ($this->ast as $declaration) {
            if ($declaration instanceof Decl\NamedDecl\ValueDecl\DeclaratorDecl\FunctionDecl) {
                if (isset($this->symbols[$declaration->name])) {
                    $result[] = $declaration;
                } else {
                    $this->warning("Skipping {$declaration->name}, not found in object file");
                }
            } elseif ($declaration instanceof Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl) {
                if (isset($this->symbols[$declaration->name])) {
                    $result[] = $declaration;
                } else {
                    $this->warning("Skipping {$declaration->name}, not found in object file");
                }
            } else {
                $result[] = $declaration;
            }
        }
        $this->ast = $result;
    }

    protected function filterDeclarations(array $declarations) {
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
                } else {
                    if (substr($declaration->name, 0, 2) !== '__' && !in_array($declaration->name, self::FUNCTIONS_TO_REMOVE)) {
                        // Skip __ functions
                        $this->definitionAst[] = $declaration;
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
        $this->ast = array_merge($this->ast, $result);
    }
}
