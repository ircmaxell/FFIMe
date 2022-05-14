<?php

declare(strict_types=1);

namespace FFIMe;

use PHPCParser\Context;
use PHPCParser\CParser;
use PHPCParser\Node\Decl;
use PHPCParser\PreProcessor\Token;
use PHPObjectSymbolResolver\Parser as ObjectParser;


class FFIMe {

    const TYPES_TO_REMOVE = [
        'void',
        'char',
        '_Bool',
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

    /** @var string[] */
    private array $code = [];

    /** @var Decl[] contains declarations of exported symbols and typedefs */
    private array $declarationAst = [];
    /** @var Decl[] contains definitions, i.e. functions with statement bodies, non-exported variables */
    private array $definitionAst = [];
    /** @var string[] */
    private array $numericDefines = [];

    private Compiler $compiler;
    private Context $context;
    private CParser $cparser;

    /** @var string[] exported symbols */
    private array $symbols;

    private bool $built = false;

    const DEFAULT_SO_SEARCH_PATHS = [
        '/usr/local/lib',
        '/usr/lib',
    ];

    /** @param string[] $headerSearchPaths
     *  @param string[] $soSearchPaths
     */
    public function __construct(string $sharedObjectFile, array $headerSearchPaths = [], array $soSearchPaths = self::DEFAULT_SO_SEARCH_PATHS) {
        $this->sofile = $this->findSOFile($sharedObjectFile, $soSearchPaths);
        $this->context = new Context($headerSearchPaths);
        $this->cparser = new CParser;
        $this->compiler = new Compiler;
        if (PHP_OS_FAMILY === 'Darwin' && !file_exists($this->sofile)) {
            $definitionFile = str_replace(".dylib", ".tbd", "/Applications/Xcode.app/Contents/Developer/Platforms/MacOSX.platform/Developer/SDKs/MacOSX.sdk{$this->sofile}");
            preg_match_all('(symbols:\s*\[\K[^]]*)', file_get_contents($definitionFile), $m);
            $symbols = [];
            foreach ($m[0] as $match) {
                $symbols[] = preg_split('(\'?\s*,\s*\'?)', trim($match, " \n'"));
            }
            $this->symbols = array_flip(array_merge(...$symbols));
        } else {
            $this->symbols = array_flip(ObjectParser::parseFor($this->sofile)->getAllSymbols());
        }
    }

    public function defineInt(string $identifier, int $value): void {
        $this->context->define($identifier, new Token(Token::NUMBER, (string) $value, 'php'));
    }

    public function defineIdentifier(string $identifier, string $value): void {
        $this->context->define($identifier, new Token(Token::IDENTIFIER, $value, 'php'));
    }

    public function defineString(string $identifier, string $value): void {
        $this->context->define($identifier, new Token(Token::LITERAL, $value, 'php'));
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

    /** @param string class to code map */
    public function getCode(): array {
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
        $this->code[$className] = $this->compiler->compile($this->sofile, $this->declarationAst, $this->definitionAst, $this->numericDefines, $className);

        foreach ($this->compiler->warnings as $warning) {
            $this->warning($warning);
        }
    }

    /** @param string[] $searchPaths */
    private function findSOFile(string $filename, array $searchPaths): string {
        if (is_file($filename)) {
            // no searching needed
            return $filename; 
        }
        // Under MacOS dyld (runtime linker) has a cache of specific objects tied to paths, which actually do not exist on disk. They have an equivalent path in the SDK, containing their exported symbol definitions
        if (PHP_OS_FAMILY === 'Darwin' && str_starts_with($filename, '/usr/lib/')) {
            if (is_file(str_replace(".dylib", ".tbd", "/Applications/Xcode.app/Contents/Developer/Platforms/MacOSX.platform/Developer/SDKs/MacOSX.sdk$filename"))) {
                return $filename;
            }
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
        foreach ($this->declarationAst as $declaration) {
            if ($declaration instanceof Decl\NamedDecl\ValueDecl\DeclaratorDecl\FunctionDecl) {
                if (isset($this->symbols[$declaration->name]) || isset($this->symbols["_{$declaration->name}"])) {
                    $result[] = $declaration;
                } else {
                    $this->warning("Skipping {$declaration->name}, not found in object file");
                }
            } elseif ($declaration instanceof Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl) {
                if (isset($this->symbols[$declaration->name]) || isset($this->symbols["_{$declaration->name}"])) {
                    $result[] = $declaration;
                } else {
                    array_unshift($this->definitionAst, $declaration);
                }
            } else {
                $result[] = $declaration;
            }
        }
        $this->declarationAst = $result;
    }

    /** @param Decl[] $declarations */
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
                    if (!in_array($declaration->name, self::FUNCTIONS_TO_REMOVE)) {
                        // Skip __ functions
                        $result[] = $declaration;
                    }
                } else {
                    if (!in_array($declaration->name, self::FUNCTIONS_TO_REMOVE)) {
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
        $this->declarationAst = array_merge($this->declarationAst, $result);
    }
}
