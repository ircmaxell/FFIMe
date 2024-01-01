<?php

declare(strict_types=1);

namespace FFIMe;

use PHPCParser\Context;
use PHPCParser\CParser;
use PHPCParser\Node\Decl;
use PHPCParser\Node\Type;
use PHPCParser\PreProcessor\Token;
use PHPObjectSymbolResolver\Parser as ObjectParser;


class FFIMe {
    const LIBC = PHP_OS_FAMILY === "Darwin" ? "/usr/lib/libSystem.B.dylib" : "/lib/x86_64-linux-gnu/libc.so.6";

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
    /** @var Decl[] contains declarations of exported symbols which are not in the primary shared objects */
    private array $skippedDeclarationAst = [];
    /** @var Decl[] contains definitions, i.e. functions with statement bodies, non-exported variables */
    private array $definitionAst = [];
    /** @var string[] */
    private array $numericDefines = [];

    private ?array $restrictedCompiledClasses = null;
    private ?array $restrictedCompiledFunctions = null;
    private ?array $restrictedCompiledConstants = null;

    private Context $context;
    private CParser $cparser;

    /** @var string[] exported symbols */
    private array $symbols;

    private bool $built = false;

    private bool $showWarnings = true;

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
        $this->symbols = array_flip(ObjectParser::parseFor($this->sofile)->getAllSymbolsRecursively());
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

    public function showWarnings(bool $show) {
        $this->showWarnings = $show;
        return $this;
    }

    public function warning(string $message) {
        if ($this->showWarnings) {
            echo "[Warning] $message\n";
        }
    }

    /** @param string class to code map */
    public function getCode(): array {
        return $this->code;
    }

    public function codeGen(string $className, string $filename): void {
        $code = $this->compile($className);
        file_put_contents($filename, '<?php ' . $code);
    }

    public function codeGenWithInstrumentation(string $className, string $filename): void {
        $code = $this->compile($className, true);
        file_put_contents($filename, '<?php ' . $code);
    }

    public function build(?string $className = null) {
        $className = $className ?? $this->getDynamicClassName();
        eval($this->compile($className));
        return $className::ffi();
    }

    public function getDynamicClassName(): string {
        $class = 'ffime\ffime_';
        do {
            $class .= mt_rand(0, 99);
        } while (class_exists($class));
        return $class;
    }

    public function restrictCompiledClasses(?array $classes) {
        if ($classes && \is_string(current($classes))) {
            $classes = array_fill_keys($classes, 1);
        }
        $this->restrictedCompiledClasses = $classes;
    }

    public function restrictCompiledConstants(?array $constants) {
        if ($constants && \is_string(current($constants))) {
            $constants = array_fill_keys($constants, 1);
        }
        $this->restrictedCompiledConstants = $constants;
    }

    public function restrictCompiledFunctions(?array $functions) {
        if ($functions && \is_string(current($functions))) {
            $functions = array_fill_keys($functions, false);
        }
        $this->restrictedCompiledFunctions = $functions;
    }

    private function checkTypeForClasses(string $namespace, \ReflectionType $type) {
        if ($type instanceof \ReflectionNamedType && str_starts_with($type->getName(), $namespace)) {
            $this->restrictedCompiledClasses[substr($type->getName(), \strlen($namespace))] = 1;
        } else {
            foreach ($type->getTypes() as $subtype) {
                $this->checkTypeForClasses($namespace, $subtype);
            }
        }
    }

    private function checkSignaturesForClasses(string $namespace, \ReflectionFunctionAbstract $func) {
        if ($ret = $func->getReturnType()) {
            $this->checkTypeForClasses($namespace, $ret);
        }
        foreach ($func->getParameters() as $parameter) {
            if ($type = $parameter->getType()) {
                $this->checkTypeForClasses($namespace, $type);
            }
        }
    }

    public function compile($className, $instrument = false): string {
        if (isset($this->code[$className]) && !$instrument) {
            return $this->code[$className];
        }

        $this->filterSymbolDeclarations();

        $ffiClass = "{$className}FFI";
        if (class_exists($ffiClass, false) && isset($ffiClass::$__visitedClasses)) {
            $this->restrictCompiledClasses($ffiClass::$__visitedClasses);
            $this->restrictCompiledConstants($ffiClass::$__visitedConstants);
            $this->restrictCompiledFunctions($ffiClass::$__visitedFunctions);
        }

        $compiler = new Compiler($instrument, $this->restrictedCompiledFunctions, $this->restrictedCompiledClasses, $this->restrictedCompiledConstants);

        $this->numericDefines = $this->context->getNumericDefines();
        $code = $compiler->compile($this->sofile, $this->declarationAst, $this->definitionAst, $this->skippedDeclarationAst, $this->numericDefines, $className);

        foreach ($compiler->warnings as $warning) {
            $this->warning($warning);
        }

        if (!$instrument) {
            $this->code[$className] = $code;
        }

        return $code;
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

    protected function isExternType(Type $type) {
        while ($type instanceof Type\AttributedType) {
            if ($type instanceof Type\ExplicitAttributedType && $type->kind === Type\ExplicitAttributedType::KIND_EXTERN) {
                return true;
            }
            $type = $type->parent;
        }
        return false;
    }

    protected function filterSymbolDeclarations(): void {
        $result = $skipped = [];
        foreach ($this->declarationAst as $declaration) {
            if ($declaration instanceof Decl\NamedDecl\ValueDecl\DeclaratorDecl\FunctionDecl) {
                if (isset($this->symbols[$declaration->name]) || isset($this->symbols["_{$declaration->name}"])) {
                    $result[] = $declaration;
                } else {
                    $skipped[] = $declaration;
                    $this->warning("Skipping {$declaration->name}, not found in object file");
                }
            } elseif ($declaration instanceof Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl) {
                if ($this->isExternType($declaration->type)) {
                    if (isset($this->symbols[$declaration->name]) || isset($this->symbols["_{$declaration->name}"])) {
                        $result[] = $declaration;
                    } else {
                        $skipped[] = $declaration;
                        $this->warning("Skipping {$declaration->name}, not found in object file");
                    }
                } else {
                    array_unshift($this->definitionAst, $declaration);
                }
            } else {
                $result[] = $declaration;
            }
        }
        $this->declarationAst = $result;
        $this->skippedDeclarationAst = $skipped;
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
