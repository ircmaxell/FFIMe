<?php

declare(strict_types=1);

namespace FFIMe;
use PHPCParser\Node\Decl;
use PHPCParser\Node\Stmt;
use PHPCParser\Node\Type;
use PHPCParser\Printer;
use PHPCParser\Node\Stmt\ValueStmt\Expr;
use FFI;

class Compiler {

    const COMPILED_PREFIX = "_ffi_internal_";

    private string $className;
    /** @var string[] */
    private array $defines;
    /** @var string[] */
    private array $resolver;
    /** @var CompiledType[] */
    private array $localVariableTypes = [];
    /** @var CompiledType[] */
    private array $globalVariableTypes = [];
    private array $compiledGlobalVariables = [];
    /** @var CompiledType[][] */
    private array $records = [];
    /** @var int[][] */
    private array $recordBitfieldSizes = [];
    /** @var Decl\NamedDecl\ValueDecl\DeclaratorDecl\FunctionDecl[] */
    private array $knownFunctions = [];
    /** @var Decl\NamedDecl\ValueDecl\DeclaratorDecl\FunctionDecl[] */
    private array $knownCompiledFunctions = [];
    /** @var string[] */
    private array $usedBuiltinTypes = [];
    private array $usedBuiltinFunctions = [];
    /** @var int[] */
    private array $baseTypeIndirections = []; // when compiling aliases, there shall be no more than 4 levels
    private bool $generateFunctionPtrDefs = false;

    /** @var string[] */
    public array $warnings = [];

    /** @param Decl[] $decls
     *  @param Decl[] $definitions
     *  @param string[] $defines
     */
    public function compile(string $soFile, array $decls, array $definitions, array $nonCompiledDeclarations, array $defines, string $className): string {
        $this->defines = $defines;
        $this->resolver = $this->buildResolver($decls);
        [$this->records, $this->recordBitfieldSizes] = $this->buildRecordFieldTypeMap($decls);
        foreach ($nonCompiledDeclarations as $decl) {
            $this->collectNonCompiledDeclaration($decl);
        }
        $parts = explode('\\', $className);
        $class = [];
        if (isset($parts[1])) {
            $className = array_pop($parts);
            $namespace = implode('\\', $parts);
            $class[] = "namespace " . $namespace . ";";
            $class[] = "use FFI;";
            $class[] = "use " . $namespace . "\\double;"; // suppress warning
        } else {
            $class[] = "use double;";
        }
        $this->className = $className;
        $class[] = "interface i{$className} {}";
        $class[] = "interface i{$className}_ptr {}";
        $classStartIndex = \count($class);
        $class[] = "class $className {";
        $class[] = "    const SOFILE = " . var_export($soFile, true) . ';';
        $class[] = "    const HEADER_DEF = " . var_export($this->compileDeclsToCode($decls), true) . ';';
        $class[] = "    private FFI \$ffi;";
        $class[] = "    private array \$__literalStrings = [];";
        foreach ($defines as $define => $value) {
            // remove type qualifiers
            $value = str_replace(['u', 'l', 'U', 'L'], '', $value);
            if (strpos($value, '.') !== false) {
                $value = str_replace(['d', 'f', 'D', 'F'], '', $value);
            }
            $class[] = "    const {$define} = {$value};";
        }
        array_push($class, ...$this->compileConstructor($definitions));
        $class[] = $this->compileMethods();
        $class[] = "    public function __get(string \$name) {";
        $class[] = "        switch(\$name) {";
        foreach ($this->compileCases($decls, false) as $case) {
            $class[] = "            $case";
        }
        foreach ($this->compileCaseDefs($definitions, false) as $case) {
            $class[] = "            $case";
        }
        $class[] = "            default: return \$this->ffi->\$name;";
        $class[] = "        }";
        $class[] = "    }";
        $class[] = "    public function __set(string \$name, \$value) {";
        $class[] = "        switch(\$name) {";
        foreach ($this->compileCases($decls, true) as $case) {
            $class[] = "            $case";
        }
        foreach ($this->compileCaseDefs($definitions, true) as $case) {
            $class[] = "            $case";
        }
        $class[] = "            default: return \$this->ffi->\$name;";
        $class[] = "        }";
        $class[] = "    }";
        $class[] = '    public function __allocCachedString(string $str): FFI\CData {';
        $class[] = '        return $this->__literalStrings[$str] ??= string_::ownedZero($str)->getData();';
        $class[] = '    }';
        foreach ($decls as $decl) {
            try {
                array_push($class, ...$this->compileDecl($decl));
            } catch (UnsupportedFeatureException $e) {
                $this->warnings[] = "{$decl->name} could not be compiled: {$e->getMessage()}";
            }
        }
        foreach ($definitions as $def) {
            try {
                array_push($class, ...$this->compileDef($def));
            } catch (UnsupportedFeatureException $e) {
                $this->warnings[] = "{$decl->name} could not be compiled: {$e->getMessage()}";
            }
        }
        foreach ($this->usedBuiltinFunctions as $function => $_) {
            array_push($class, ...BuiltinFunction::$registry[$function]->print());
        }
        $class[] = "}\n";

        $publicProperties = ["/**"];
        foreach ($this->globalVariableTypes as $var => $type) {
            $publicProperties[] = " * @property " . $this->toPHPType($type) . ' $' . $var;
        }
        if (\count($publicProperties) > 1) {
            $publicProperties[] = " */";
            array_splice($class, $classStartIndex, 0, $publicProperties);
        }

        // we need to compile this early because of the side effects on usedBuiltinTypes
        $declClasses = [];
        foreach ($decls as $decl) {
            try {
                array_push($declClasses, ...$this->compileDeclClass($decl));
            } catch (UnsupportedFeatureException $e) {
                $this->warnings[] = "{$decl->name} could not be compiled: {$e->getMessage()}";
            }
        }

        array_push($class, ...$this->compileDeclClassImpl('string_', new CompiledType('int', [null], 'char')));
        array_push($class, ...$this->compileDeclClassImpl('string_ptr', new CompiledType('int', [null, null], 'char')));
        array_push($class, ...$this->compileDeclClassImpl('string_ptr_ptr', new CompiledType('int', [null, null, null], 'char')));
        array_push($class, ...$this->compileDeclClassImpl('string_ptr_ptr_ptr', new CompiledType('int', [null, null, null], 'char')));
        array_push($class, ...$this->compileDeclClassImpl('void_ptr', new CompiledType('void', [null])));
        array_push($class, ...$this->compileDeclClassImpl('void_ptr_ptr', new CompiledType('void', [null, null])));
        array_push($class, ...$this->compileDeclClassImpl('void_ptr_ptr_ptr', new CompiledType('void', [null, null, null])));
        array_push($class, ...$this->compileDeclClassImpl('void_ptr_ptr_ptr_ptr', new CompiledType('void', [null, null, null, null])));
        if ($this->generateFunctionPtrDefs) {
            array_push($class, ...$this->compileFunctionPtrClassImpl(1));
            array_push($class, ...$this->compileFunctionPtrClassImpl(2));
            array_push($class, ...$this->compileFunctionPtrClassImpl(3));
            array_push($class, ...$this->compileFunctionPtrClassImpl(4));
        }
        foreach (array_keys($this->usedBuiltinTypes) as $builtinType) {
            if (str_starts_with($builtinType, "__builtin_")) {
                for ($i = 0; $i <= 4; ++$i) {
                    array_push($class, ...$this->compileDeclClassImpl($builtinType . str_repeat('_ptr', $i), new CompiledType($builtinType, array_fill(0, $i, null))));
                }
            }
        }
        foreach ($this->records as $record => $fields) {
            $recordClass = strtr($record, " ", "_");
            for ($i = 0; $i <= 4; ++$i) {
                array_push($class, ...$this->compileDeclClassImpl($recordClass . str_repeat('_ptr', $i), new CompiledType($record, array_fill(0, $i, null))));
            }
        }
        $nativeTypeGroupings = array_merge(array_values($this->groupNativeTypesOfSameSize(self::INT_TYPES)), array_values($this->groupNativeTypesOfSameSize(self::FLOAT_TYPES)));
        foreach ($nativeTypeGroupings as $nativeTypeGroup) {
            $firstNativeTypeMatch = null;
            foreach ($nativeTypeGroup as $nativeType) {
                if (isset($this->usedBuiltinTypes[$nativeType])) {
                    $nativeType = strtr($nativeType, " ", "_");
                    if ($firstNativeTypeMatch) {
                        for ($i = 1; $i <= 4; ++$i) {
                            $class[] = '\class_alias(__NAMESPACE__ . "\\\\' . $firstNativeTypeMatch . str_repeat('_ptr', $i) . '", __NAMESPACE__ . "\\\\' . $nativeType . str_repeat('_ptr', $i) . '");';
                        }
                    } else {
                        $firstNativeTypeMatch = $nativeType;
                        for ($i = 1; $i <= 4; ++$i) {
                            array_push($class, ...$this->compileDeclClassImpl($nativeType . str_repeat('_ptr', $i), new CompiledType(in_array($nativeType, self::FLOAT_TYPES) ? 'float' : 'int', array_fill(0, $i, null), $nativeType)));
                        }
                    }
                }
            }
        }
        array_push($class, ...$declClasses);
        return implode("\n", $class);
    }

    /** @param Decl[] $decls
     *  @return string[]
     */
    public function compileCases(array $decls, bool $isSetter): array {
        $results = [];
        foreach ($decls as $decl) {
            if ($decl instanceof Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl) {
                $results[] = $this->compileCase($decl, "ffi->", $isSetter);
            }
        }
        return $results;
    }

    /** @param Decl[] $decls
     *  @return string[]
     */
    public function compileCaseDefs(array $decls, bool $isSetter): array {
        $results = [];
        foreach ($decls as $decl) {
            if ($decl instanceof Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl) {
                $results[] = $this->compileCase($decl, "", $isSetter);
            }
        }
        return $results;
    }

    private function compileCase(Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl $decl, string $ffiAccess, bool $isSetter): string {
        $return = $this->compileType($decl->type);
        $line = "case " . var_export($decl->name, true) . ": ";
        if ($return->isNative) {
            if ($isSetter) {
                $line .= "\$this->$ffiAccess{$decl->name} = " . ($return->rawValue === 'char' ? '\chr($value)' : '$value') . "; break;";
            } else {
                $line .= "return " . ($return->rawValue === 'char' ? "\ord(\$this->$ffiAccess{$decl->name})" : "\$this->$ffiAccess{$decl->name}") . ";";
            }
        } else {
            $object = $this->toPHPValue($return, '$this->' . $ffiAccess . $decl->name);
            if ($isSetter) {
                $line .= "($object)->set(\$value); break;";
            } else {
                $line .= "return $object;";
            }
        }
        return $line;
    }

    /** @param Decl[] $decls
     *  @return string[]
     */
    protected function compileConstructor(array $decls): array {
        $ctor[] = '    public function __construct(string $pathToSoFile = self::SOFILE) {';
        $ctor[] = '        $this->ffi = FFI::cdef(self::HEADER_DEF, $pathToSoFile);';
        foreach ($decls as $decl) {
            if ($decl instanceof Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl) {
                $varType = $this->compileType($decl->type);
                if ($decl->initializer) {
                    // compileInitializer completes incomplete array types
                    $initializer = $decl->initializer instanceof Expr\InitializerExpr && $decl->initializer->explicitType === null ? $this->compileInitializer($varType, $decl->initializer->initializers)->value : $this->compileExpr($decl->initializer)->toValue($varType);
                }
                $ctor[] = '        $this->' . $decl->name . ' = $this->ffi->new("' . $varType->toValue() . '");';
                if ($decl->initializer) {
                    $ctor[] = '        ' . ($varType->isNative ? '$this->' . $decl->name . '->cdata' : 'FFI::addr($this->' . $decl->name . ')[0]') . ' = ' . $initializer . ';';
                }
            }
        }
        $ctor[] = '    }';
        return $ctor;
    }

    protected function compileMethods(): string {
        return '
    public function cast(i'. $this->className . ' $from, string $to): i' . $this->className . ' {
        if (!is_a($to, i' . $this->className . '::class)) {
            throw new \LogicException("Cannot cast to a non-wrapper type");
        }
        return new $to($this->ffi->cast($to::getType(), $from->getData()));
    }

    public function makeArray(string $class, array $elements) {
        $type = $class::getType();
        if (substr($type, -1) !== "*") {
            throw new \LogicException("Attempting to make a non-pointer element into an array");
        }
        $cdata = $this->ffi->new(substr($type, 0, -1) . "[" . count($elements) . "]");
        foreach ($elements as $key => $raw) {
            $cdata[$key] = $raw === null ? null : $raw->getData();
        }
        return new $class($cdata);
    }

    public function sizeof($classOrObject): int {
        if (is_object($classOrObject) && $classOrObject instanceof i' . $this->className . ') {
            return $this->ffi->sizeof($classOrObject->getData());
        } elseif (is_a($classOrObject, i' . $this->className . '::class)) {
            return $this->ffi->sizeof($this->ffi->type($classOrObject::getType()));
        } else {
            throw new \LogicException("Unknown class/object passed to sizeof()");
        }
    }

    public function getFFI(): FFI {
        return $this->ffi;
    }

';
    }

    /** @param Decl[] $decls */
    public function compileDeclsToCode(array $decls): string {
        // TODO
        $printer = new Printer\C;
        $defs = $printer->printNodes($decls, 0);
        // hack to make _Complex disappear (it's just definitions)
        // there probably should be a recursive cleanup of everything _Complex ...
        // FFI sadly does not support _Complex yet
        $defs = preg_replace('(\b_Complex\b)', '', $defs);

        // FFI does not support 128 bit wide ints/floats either
        $defs = preg_replace('(\b__int128\b)', 'int', $defs);
        $defs = preg_replace('(\b__float128\b)', 'float', $defs);
        return $defs;
    }

    /** @return string[] */
    public function compileDef(Decl $def): array {
        $this->localVariableTypes = [];

        $return = [];
        if ($def instanceof Decl\NamedDecl\ValueDecl\DeclaratorDecl\FunctionDecl) {
            $this->knownCompiledFunctions[$def->name] = $def;

            [$return, $functionType, $params, $returnType] = $this->compileFunctionStart($def);
            foreach ($params as $idx => $param) {
                $varname = $functionType->paramNames[$idx];
                $this->localVariableTypes[$varname] = $param;
            }
            $callParams = [];
            foreach ($params as $idx => $param) {
                $callParams[] = '$' . ($functionType->paramNames[$idx] ?: "_$idx");
            }
            if ($returnType->value !== 'void') {
                $return[] = '        $result = $this->' . self::COMPILED_PREFIX . $def->name . '(' . implode(', ', $callParams) . ');';
                if ($returnType->isNative) {
                    $return[] = '        return $result;';
                } else {
                    $return[] = '        return $result === null ? null : ' . $this->toPHPValue($returnType, '$result') . ';';
                }
            } else {
                $return[] = '        $this->' . self::COMPILED_PREFIX . $def->name . '(' . implode(', ', $callParams) . ');';
            }
            $return[] = "    }";

            $nullableReturnType = $returnType->value === 'void' ? 'void' : ($returnType->isNative ? $returnType->value : '?FFI\CData');
            $paramSignature = [];
            foreach ($params as $idx => $param) {
                $varname = $functionType->paramNames[$idx] ?: "_$idx";
                $paramSignature[] = ($param->isNative ? $param->value : 'FFI\CData') . ' $' . $varname;
            }
            $return[] = "    private function " . self::COMPILED_PREFIX . "{$def->name}(" . implode(', ', $paramSignature) . "): " . $nullableReturnType . " {";
            foreach ($params as $idx => $param) {
                if ($param->isNative) {
                    $varname = $functionType->paramNames[$idx] ?: "_$idx";
                    $return[] = '        $' . $varname . ' = (function ($cdata, $val) { $cdata->cdata = $val; return $cdata; })($this->ffi->new("' . $param->value . '"), $' . $varname . ');';
                }
            }
            $return = array_merge($return, $this->compileStmt($def->stmts));
            $return[] = "    }";
        } elseif ($def instanceof Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl) {
            $this->globalVariableTypes[$def->name] = $this->compileType($def->type);
            $this->compiledGlobalVariables[$def->name] = true;
            $return[] = '    private FFI\CData $' . $def->name . ';';
        }
        return $return;
    }

    /** @return string[] */
    public function compileStmt(Stmt $stmt, $level = 2): array {
        $result = [];
        if ($stmt instanceof Stmt\CompoundStmt) {
            foreach ($stmt->stmts as $stmt) {
                array_push($result, ...$this->compileStmt($stmt, $level));
            }
        } else {
            if ($stmt instanceof Stmt\ReturnStmt) {
                $result[] = str_repeat(' ', $level * 4) . 'return ' . $this->compileExpr($stmt->result)->value . ';';
            } elseif ($stmt instanceof Expr) {
                $result[] = str_repeat(' ', $level * 4) . $this->compileExpr($stmt)->value . ';';
            } elseif ($stmt instanceof Stmt\DeclStmt) {
                foreach ($this->compileDeclStmt($stmt) as $declResult) {
                    $result[] = str_repeat(' ', $level * 4) . $declResult . ';';
                }
            } elseif ($stmt instanceof Stmt\IfStmt) {
                $result[] = str_repeat(' ', $level * 4) . 'if (' . $this->compileExpr($stmt->condition)->toBool() . ') {';
                array_push($result, ...$this->compileStmt($stmt->trueStmt, $level + 1));
                if ($stmt->falseStmt) {
                    $result[] = str_repeat(' ', $level * 4) . '} else {';
                    array_push($result, ...$this->compileStmt($stmt->falseStmt, $level + 1));
                }
                $result[] = str_repeat(' ', $level * 4) . '}';
            } elseif ($stmt instanceof Stmt\LoopStmt) {
                if ($stmt->condition && !$stmt->initStmt && !$stmt->loopExpr) {
                    $loop = 'while (' . $this->compileExpr($stmt->condition)->toBool() . ')';
                } else {
                    $loop = 'for (';
                    if ($stmt->initStmt) {
                        if ($stmt->initStmt instanceof Stmt\DeclStmt) {
                            if ($decls = $this->compileDeclStmt($stmt->initStmt)) {
                                $loop .= implode(', ', $decls);
                            }
                        } elseif ($stmt->initStmt instanceof Expr) {
                            $loop .= $this->compileExpr($stmt->initStmt)->value;
                        }
                    }
                    $loop .= ';' . ($stmt->condition ? ' ' . $this->compileExpr($stmt->condition)->toBool() : '') . ';' . ($stmt->loopExpr ? ' ' . $this->compileExpr($stmt->loopExpr)->value : '') . ')';
                }
                $result[] = str_repeat(' ', $level * 4) . $loop . ' {';
                array_push($result, ...$this->compileStmt($stmt->loopStmt, $level + 1));
                $result[] = str_repeat(' ', $level * 4) . '}';
            } elseif ($stmt instanceof Stmt\AsmStmt) {
                $result[] = str_repeat(' ', $level * 4) . 'throw new \LogicException("Unsupported assembly statement");';
            } else {
                var_dump($stmt);
            }
        }
        return $result;
    }

    /** @return string[] */
    public function compileDeclStmt(Stmt\DeclStmt $stmt): array {
        $result = [];
        foreach ($stmt->declarations->declarations as $decl) {
            if ($decl instanceof Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl) {
                $varType = $this->compileType($decl->type);
                if ($decl->initializer) {
                    // compileInitializer completes incomplete array types
                    $initializer = $decl->initializer instanceof Expr\InitializerExpr && $decl->initializer->explicitType === null ? $this->compileInitializer($varType, $decl->initializer->initializers)->value : $this->compileExpr($decl->initializer)->toValue($varType);
                }
                $result[] = '$' . $decl->name . ' = $this->ffi->new("' . $varType->toValue() . '")';
                if ($decl->initializer) {
                    $result[] = ($varType->isNative ? '$' . $decl->name . '->cdata' : 'FFI::addr($' . $decl->name . ')[0]') . ' = ' . $initializer;
                }
                $this->localVariableTypes[$decl->name] = $varType;
            } else {
                var_dump($decl);
            }
        }
        return $result;
    }

    // as a side effect, we are completing incomplete array types here
    /** @param Expr\Initializer\InitializerElement[] $initializers */
    public function compileInitializer(CompiledType $type, array $initializers): ?CompiledExpr {
        // generator traversing a type and yielding all possible designators
        $generateImplicitDesignators = function (CompiledType $activeType, string $compiledDesignator = "", int $indirectionIndex = 0, int $implicitNestingIndex = 0) use ($type, &$generateImplicitDesignators) {
            if ($implicitNestingIndex > 50) {
                throw new \LogicException("Found recursion, cannot generate designators for type " . $activeType->rawValue);
            }
            $flatten = $implicitNestingIndex === 0 && yield;
            if ($activeType->indirections() === $indirectionIndex || $activeType->indirections[$indirectionIndex] === null) {
                if ($activeType->baseTypeIsNative() || ($activeType->indirections[$indirectionIndex] ?? true) === null) {
                    return yield [$activeType, $indirectionIndex] => $compiledDesignator;
                } else {
                    foreach ($this->records[$activeType->rawValue] as $field => $fieldType) {
                        $nextCompiledDesignator = $compiledDesignator . '->' . $field;
                        if ($flatten) {
                            $flatten = yield [$fieldType, 0] => $nextCompiledDesignator;
                        } else {
                            $flatten = yield from $generateImplicitDesignators($fieldType, $nextCompiledDesignator, implicitNestingIndex: $implicitNestingIndex + 1);
                            if ($flatten && $implicitNestingIndex > 0) {
                                return true;
                            }
                        }
                    }
                }
            } else {
                $wrapAroundOffset = $activeType->indirections[$indirectionIndex];
                try {
                    if ($wrapAroundOffset === false) {
                        $wrapAroundOffset = PHP_INT_MAX;
                    }
                    for ($dimension = 0; $dimension < $wrapAroundOffset;) {
                        $nextCompiledDesignator = $compiledDesignator . '[' . $dimension++ . ']';
                        if ($flatten) {
                            $flatten = yield [$activeType, $indirectionIndex + 1] => $nextCompiledDesignator;
                        } else {
                            $flatten = yield from $generateImplicitDesignators($activeType, $nextCompiledDesignator, $indirectionIndex + 1, $implicitNestingIndex + 1);
                            if ($flatten && $implicitNestingIndex > 0) {
                                return true;
                            }
                        }
                    }
                } finally {
                    if ($activeType === $type && $type->indirections[$indirectionIndex] === false) {
                        $type->indirections[$indirectionIndex] = $dimension;
                    }
                }
            }
            return $flatten;
        };

        // generator traversing a type according to a given list of designators, then, starting from there, iterating and returning all possible designators
        ($generateDesignators = function (array $designators, CompiledType $activeType, string $compiledDesignator = "", int $designatorIdx = 0, ?bool $flatten = null, int $indirectionIndex = 0) use ($type, &$generateDesignators, $generateImplicitDesignators) {
            $flatten ??= yield;
            $designator = $designators[$designatorIdx];
            if ($designator instanceof Expr\Initializer\InitializerStructRef) {
                $matched = false;
                foreach ($this->records[$activeType->rawValue] as $field => $fieldType) {
                    if ($designator->memberName === $field) {
                        $matched = true;
                    }
                    if ($matched) {
                        $nextCompiledDesignator = $compiledDesignator . '->' . $field;
                        if (\count($designators) === $designatorIdx + 1) {
                            $implicitGen = $generateImplicitDesignators($fieldType, $nextCompiledDesignator);
                            $implicitGen->send($flatten);
                            $flatten = yield from $implicitGen;
                        } else {
                            $flatten = yield from $generateDesignators($designators, $fieldType, $nextCompiledDesignator, $designatorIdx + 1, $flatten);
                        }
                    }
                }
            } elseif ($designator instanceof Expr\Initializer\InitializerDimension) {
                if (null === $dimension = $this->compileConstantExpr($designator->dimension)) {
                    var_dump($designator);
                } else {
                    $wrapAroundOffset = $activeType->indirections[$indirectionIndex];
                    try {
                        if ($wrapAroundOffset === false) {
                            $wrapAroundOffset = PHP_INT_MAX;
                        }
                        while ($dimension < $wrapAroundOffset) {
                            $nextCompiledDesignator = $compiledDesignator . '[' . $dimension++ . ']';
                            if (\count($designators) === $designatorIdx + 1) {
                                $implicitGen = $generateImplicitDesignators($activeType, $nextCompiledDesignator, $indirectionIndex + 1);
                                $implicitGen->send($flatten);
                                $flatten = yield from $implicitGen;
                            } else {
                                $flatten = yield from $generateDesignators($designators, $activeType, $nextCompiledDesignator, $designatorIdx + 1, $flatten, $indirectionIndex + 1);
                            }
                        }
                    } finally {
                        if ($activeType === $type && $type->indirections[$indirectionIndex] === false) {
                            $type->indirections[$indirectionIndex] = $dimension;
                        }
                    }
                }
            } else {
                var_dump($designator);
            }
            return $flatten;
        });

        $initializerArgs = [];
        $initializerAssignments = [];

        ($compile = /** @param Expr\Initializer\InitializerElement[] $initializers */ function (CompiledType $type, array $initializers, string $compiledDesignator = "", int $indirectionIndex = 0) use (&$compile, &$initializerArgs, &$initializerAssignments, $generateDesignators, $generateImplicitDesignators) {
            $designatorGenerator = $generateImplicitDesignators($type, indirectionIndex: $indirectionIndex);
            foreach ($initializers as $initializerIndex => $initializerExpr) {
                if ($initializerExpr->designators) {
                    $designatorGenerator = $generateDesignators($initializerExpr->designators, $type, indirectionIndex: $indirectionIndex);
                }

                if ($initializerExpr->expr instanceof Expr\InitializerExpr) {
                    $designatorGenerator->send(true); // get the next "flattened" value
                    if (!$designatorGenerator->valid()) {
                        throw new \LogicException('Exhausted designations at initializer offset #' . $initializerIndex . ' for type ' . $type->toValue() . ' (indirection level ' . $initializerIndex . ')');
                    }

                    [$innerType, $innerIndirectionIndex] = $designatorGenerator->key();
                    $compile($innerType, $initializerExpr->expr->initializers, $designatorGenerator->current(), $innerIndirectionIndex);
                    continue;
                }

                $designatorGenerator->send(false);

                if (!$designatorGenerator->valid()) {
                    throw new \LogicException('Exhausted designations at initializer offset #' . $initializerIndex . ' for type ' . $type->toValue() . ' (indirection level ' . $initializerIndex . ')');
                }

                // Per spec, the last initializer defining a specific offset wins
                $arg = '$arg_' . $initializerIndex;
                [$innerType, $innerIndirectionIndex] = $designatorGenerator->key();
                $initializerArgs[$arg] = $this->compileExpr($initializerExpr->expr)->toValue($innerIndirectionIndex ? new CompiledType($innerType->value, array_slice($innerType->indirections, $innerIndirectionIndex), $innerType->rawValue) : $innerType);
                $cdataPath = '$cdata' . $compiledDesignator . $designatorGenerator->current();
                $initializerAssignments[$arg] = ($innerType->isNative ? $cdataPath . '->cdata' : 'FFI::addr(' . $cdataPath . ')[0]') . ' = ' . $arg . ';';
            }
        })($type, $initializers);
        if (!$initializerArgs) {
            return new CompiledExpr('$this->ffi->new("' . $type->toValue() . '")');
        }
        return new CompiledExpr('(static function ($cdata, ' . implode(", ", array_keys($initializerArgs)) . ') { ' . implode(" ", $initializerAssignments) . ' return $cdata; })($this->ffi->new("' . $type->toValue() . '"), ' . implode(", ", $initializerArgs) . ')');
    }

    public function collectNonCompiledDeclaration(Decl $declaration): void {
        if ($declaration instanceof Decl\NamedDecl\ValueDecl\DeclaratorDecl\FunctionDecl) {
            $this->knownFunctions[$declaration->name] = $declaration;
        } elseif ($declaration instanceof Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl) {
            $this->globalVariableTypes[$declaration->name] = $this->compileType($declaration->type);
        }
    }

    /** @return string[] */
    public function compileDecl(Decl $declaration): array {
        $return = [];
        if ($declaration instanceof Decl\NamedDecl\ValueDecl\DeclaratorDecl\FunctionDecl) {
            // C allows for repeated identical declarations with the same name
            if (isset($this->knownFunctions[$declaration->name])) {
                return [];
            }

            [$return, $functionType, $params, $returnType] = $this->compileFunctionStart($declaration);

            $callParams = [];
            foreach ($params as $idx => $param) {
                $callParams[] = '$' . ($functionType->paramNames[$idx] ?: "_$idx");
            }
            if ($returnType->value !== 'void') {
                $return[] = '        $result = $this->ffi->' . $declaration->name . '(' . implode(', ', $callParams) . ');';
                if ($returnType->isNative) {
                    $return[] = '        return ' . ($returnType->rawValue === 'char' ? '\ord($result)' : '$result') . ';';
                } else {
                    $return[] = '        return $result === null ? null : ' . $this->toPHPValue($returnType, '$result') . ';';
                }
            } else {
                $return[] = '        $this->ffi->' . $declaration->name . '(' . implode(', ', $callParams) . ');';
            }
            $return[] = "    }";
        } elseif ($declaration instanceof Decl\NamedDecl\TypeDecl\TagDecl\EnumDecl) {
            if ($declaration->name !== null) {
                $return[] = "    // enum {$declaration->name}";
            }
            enum_decl:
            if ($declaration->fields !== null) {
                $id = 0;
                $lastValue = 0;
                foreach ($declaration->fields as $field) {
                    if (isset($this->defines[$field->name])) {
                        $id++;
                        continue;
                    }
                    $this->defines[$field->name] = false; // dummy, marking enum value
                    if ($field->value !== null) {
                        $lastValue =  $this->compileExpr($field->value)->value;
                        $id = 0;
                    }
                    // Add, since lastValue may be an expression...
                    $return[] = "    const {$field->name} = ($lastValue) + $id;";
                    $id++;
                }
            }
        } elseif ($declaration instanceof Decl\NamedDecl\TypeDecl\TypedefNameDecl && $declaration->type instanceof Type\TagType\EnumType) {
            $return[] = "    // typedefenum {$declaration->name}";
            $declaration = $declaration->type->decl;
            goto enum_decl;
        } elseif ($declaration instanceof Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl) {
            $this->globalVariableTypes[$declaration->name] = $this->compileType($declaration->type);
        }
        if (str_starts_with($declaration->name ?? "", '__')) {
            return [];
        }
        return $return;
    }

    /** @return array{string[], Type, CompiledType[], CompiledType} */
    public function compileFunctionStart(Decl\NamedDecl\ValueDecl\DeclaratorDecl\FunctionDecl $decl): array {
        $this->knownFunctions[$decl->name] = $decl;
        $functionType = $decl->type;
        while ($functionType instanceof Type\ExplicitAttributedType) {
            $functionType = $functionType->parent;
        }
        $returnType = $this->compileType($functionType->return);
        $params = $this->compileParameters($functionType->params);
        $nullableReturnType = $returnType->value === 'void' ? 'void' : (($returnType->isNative ? '' : '?') . $this->toPHPType($returnType));
        $paramSignature = [];
        foreach ($params as $idx => $param) {
            $varname = $functionType->paramNames[$idx] ?: "_$idx";
            $phpParam = $this->toPHPType($param);
            $paramSignature[] = ($phpParam !== 'void_ptr' ? ($param->indirections() > 0 ? "void_ptr | " : "") . $phpParam : "i{$this->className}_ptr") . ($param->isNative ? '' : ' | null') . ($phpParam === 'string_' ? ' | string' : '') . ($param->indirections() >= 1 ? ' | array' : '') . ' $' . $varname;
        }
        $return[] = "    public function {$decl->name}(" . implode(', ', $paramSignature) . "): " . $nullableReturnType . " {";
        foreach ($params as $idx => $param) {
            $varname = $functionType->paramNames[$idx] ?: "_$idx";
            $hasIf = false;
            if ($this->toPHPType($param) === 'string_') {
                $return[] = '        if (\is_string($' . $varname . ')) {';
                $return[] = '            $' . $varname . ' = string_::ownedZero($' . $varname . ')->getData();';
                $hasIf = true;
            }
            if ($param->indirections() >= 1) {
                $return[] = '        ' . ($hasIf ? '} else' : '') . 'if (\is_array($' . $varname . ')) {';
                $return[] = '            $_ = $this->ffi->new("' . $param->rawValue . str_repeat("*", $param->indirections() - 1) . '[" . \count($' . $varname . ') . "]");';
                $return[] = '            foreach (\array_values($' . $varname . ') as $_k => $_v) {';
                $return[] = '                $_[$_k] = $_v' . ($param->indirections() === 1 && $param->baseTypeIsNative() ? '' : '->getData()') . ';';
                $return[] = '            }';
                $return[] = '            $' . $varname . ' = $_;';
                $hasIf = true;
            }
            if (!$param->isNative) {
                if ($hasIf) {
                    $return[] = '        } else {';
                }
                $return[] = ($hasIf ? '    ' : '') . '        $' . $varname . ' = $' . $varname . '->getData();';
            }
            if ($hasIf) {
                $return[] = '        }';
            }
        }
        return [$return, $functionType, $params, $returnType];
    }

    protected function formatString(string $string): string {
        static $replacements;
        if (!$replacements) {
            $replacements = ["\0" => '\0', "\n" => '\n', "\t" => '\t', "\v" => '\v', "\e" => '\e', '??' => '\??', '\\' => '\\\\', '"' => '\"'];
            for ($i = 1; $i < 0x20; ++$i) {
                $replacements[\chr($i)] = sprintf('\x%02x', $i);
            }
            for ($i = 0x7f; $i <= 0xFF; ++$i) {
                $replacements[\chr($i)] = sprintf('\x%02x', $i);
            }
        }
        return '"' . strtr($string, $replacements) . '"';
    }

    public function compileConstantExpr(Expr $expr) {
        if ($expr instanceof Expr\IntegerLiteral) {
            return (int) str_replace(['u', 'U', 'l', 'L'], '', $expr->value);
        }
        if ($expr instanceof Expr\UnaryOperator && null !== $op = $this->compileConstantExpr($expr->expr)) {
            switch ($expr->kind) {
                case Expr\UnaryOperator::KIND_PLUS:
                    return $op;
                case Expr\UnaryOperator::KIND_MINUS:
                    return -$op;
                case Expr\UnaryOperator::KIND_BITWISE_NOT:
                    return ~$op;
                case Expr\UnaryOperator::KIND_LOGICAL_NOT:
                    return (int) !$op;
                case Expr\UnaryOperator::KIND_ALIGNOF:
                    return FFI::alignof($op);
                case Expr\UnaryOperator::KIND_SIZEOF:
                    return FFI::sizeof($op);
            }
        }
        if ($expr instanceof Expr\BinaryOperator && null !== ($left = $this->compileConstantExpr($expr->left)) && null !== ($right = $this->compileConstantExpr($expr->right))) {
            switch ($expr->kind) {
                case Expr\BinaryOperator::KIND_ADD:
                    return $left + $right;
                case Expr\BinaryOperator::KIND_SUB:
                    return $left - $right;
                case Expr\BinaryOperator::KIND_MUL:
                    return $left * $right;
                case Expr\BinaryOperator::KIND_DIV:
                    return $left / $right;
                case Expr\BinaryOperator::KIND_REM:
                    return $left % $right;
                case Expr\BinaryOperator::KIND_SHL:
                    return $left << $right;
                case Expr\BinaryOperator::KIND_SHR:
                    return $left >> $right;
                case Expr\BinaryOperator::KIND_LT:
                    return $left < $right;
                case Expr\BinaryOperator::KIND_GT:
                    return $left > $right;
                case Expr\BinaryOperator::KIND_LE:
                    return $left <= $right;
                case Expr\BinaryOperator::KIND_GE:
                    return $left >= $right;
                case Expr\BinaryOperator::KIND_EQ:
                    return $left == $right;
                case Expr\BinaryOperator::KIND_NE:
                    return $left != $right;
                case Expr\BinaryOperator::KIND_BITWISE_AND:
                    return $left & $right;
                case Expr\BinaryOperator::KIND_BITWISE_OR:
                    return $left | $right;
                case Expr\BinaryOperator::KIND_BITWISE_XOR:
                    return $left ^ $right;
                case Expr\BinaryOperator::KIND_LOGICAL_AND:
                    return $left && $right;
                case Expr\BinaryOperator::KIND_LOGICAL_OR:
                    return $left || $right;
                case Expr\BinaryOperator::KIND_COMMA:
                    return $right;
            }
        }
        return null;
    }

    public function buildTypeDefinition(CompiledType $type) : string {
        if ($type->baseTypeIsNative()) {
            return $type->toValue();
        }
        $fields = [];
        foreach ($this->records[$type->rawValue] as $fieldname => $field) {
            // TODO grouping of unnamed inline structs and unions
            $fields[] = $this->buildTypeDefinition($field) . ' ' . $fieldname . (isset($this->recordBitfieldSizes[$type->rawValue][$fieldname]) ? ': ' . $this->recordBitfieldSizes[$type->rawValue][$fieldname] : '') . ';';
        }
        return $type->toValue(explode(" ", $type->rawValue)[0] . '{' . implode($fields) . '}');
    }

    public function calcSize(CompiledType $type) {
        return \FFI::sizeof(\FFI::type($this->buildTypeDefinition($type)));
    }

    public function compileExpr(Expr $expr, bool $isAssign = false, bool $isAddrOf = false): CompiledExpr {
        if ($expr instanceof Expr\IntegerLiteral) {
            // parse out type qualifiers
            $value = str_replace(['u', 'U', 'l', 'L'], '', $expr->value);
            return new CompiledExpr((string) (int) $value);
        }
        if ($expr instanceof Expr\AbstractConditionalOperator\ConditionalOperator) {
            // assume this is valid and both of a common type
            $true = $this->compileExpr($expr->ifTrue);
            return $true->withCurrent('(' . $this->compileExpr($expr->cond)->toValue() . ' ? ' . $true->value . ' : ' . $this->compileExpr($expr->ifFalse)->value . ')');
        }
        if ($expr instanceof Expr\UnaryOperator) {
            $op = $this->compileExpr($expr->expr, isAssign: $expr->kind === Expr\UnaryOperator::KIND_DEREF && $isAssign, isAddrOf: $expr->kind === Expr\UnaryOperator::KIND_ADDRESS_OF);
            switch ($expr->kind) {
                case Expr\UnaryOperator::KIND_PLUS:
                    return new CompiledExpr('(+' . $op->toValue() . ')');
                case Expr\UnaryOperator::KIND_MINUS:
                    return new CompiledExpr('(-' . $op->toValue() . ')');
                case Expr\UnaryOperator::KIND_BITWISE_NOT:
                    return new CompiledExpr('(~' . $op->toValue() . ')');
                case Expr\UnaryOperator::KIND_LOGICAL_NOT:
                    return new CompiledExpr('(!' . $op->toValue() . ')');
                case Expr\UnaryOperator::KIND_POSTDEC:
                    return $op->withCurrent('(' . $op->toValue() . '--)');
                case Expr\UnaryOperator::KIND_POSTINC:
                    return $op->withCurrent('(' . $op->toValue() . '++)');
                case Expr\UnaryOperator::KIND_PREDEC:
                    return $op->withCurrent('(--' . $op->toValue() . ')');
                case Expr\UnaryOperator::KIND_PREINC:
                    return $op->withCurrent('(++' . $op->toValue() . ')');
                case Expr\UnaryOperator::KIND_ADDRESS_OF:
                    if ($op->type instanceof CompiledFunctionType && $op->type->indirections() === 0) {
                        return $op->withCurrent($op->value, 1);
                    } else {
                        return $op->withCurrent('FFI::addr(' . $op->value . ')', 1);
                    }
                case Expr\UnaryOperator::KIND_DEREF:
                    $value = $op->value;
                    if ($isAssign && (($expr->expr instanceof Expr\UnaryOperator && in_array($expr->expr->kind, [Expr\UnaryOperator::KIND_PREINC, Expr\UnaryOperator::KIND_POSTINC, Expr\UnaryOperator::KIND_PREDEC, Expr\UnaryOperator::KIND_POSTDEC])) || $expr->expr instanceof Expr\BinaryOperator)) {
                        $value = "(fn() => $value)()";
                    }
                    return $op->withCurrent($isAssign || $op->type->rawValue !== 'char' ? $value . '[0]' : '\ord(' . $value . '[0])', -1);
                case Expr\UnaryOperator::KIND_ALIGNOF:
                    return new CompiledExpr('FFI::alignof(' . ($op->cdata ? $op->value : '$this->ffi->type(' . $op->value . ')') . ')');
                case Expr\UnaryOperator::KIND_SIZEOF:
                    return new CompiledExpr('FFI::sizeof(' . ($op->cdata ? $op->value : '$this->ffi->type(' . $op->value . ')') . ')');
                default:
                    throw new \LogicException("Unsupported unary operator for library: " . $expr->kind);
            }
        }
        if ($expr instanceof Expr\BinaryOperator) {
            $left = $this->compileExpr($expr->left, isAssign: $expr->kind === Expr\BinaryOperator::KIND_ASSIGN);
            $right = $this->compileExpr($expr->right);
            $opChar = [
                    Expr\BinaryOperator::KIND_ADD => '+',
                    Expr\BinaryOperator::KIND_MUL => '*',
                    Expr\BinaryOperator::KIND_DIV => '/',
                    Expr\BinaryOperator::KIND_REM => '%',
                    Expr\BinaryOperator::KIND_SHL => '<<',
                    Expr\BinaryOperator::KIND_SHR => '>>',
                    Expr\BinaryOperator::KIND_LT => '<',
                    Expr\BinaryOperator::KIND_GT => '>',
                    Expr\BinaryOperator::KIND_LE => '<=',
                    Expr\BinaryOperator::KIND_GE => '>=',
                    Expr\BinaryOperator::KIND_EQ => '==',
                    Expr\BinaryOperator::KIND_NE => '!=',
                    Expr\BinaryOperator::KIND_BITWISE_AND => '&',
                    Expr\BinaryOperator::KIND_BITWISE_OR => '|',
                    Expr\BinaryOperator::KIND_BITWISE_XOR => '^',
                    Expr\BinaryOperator::KIND_LOGICAL_AND => '&&',
                    Expr\BinaryOperator::KIND_LOGICAL_OR => '||',
                ][$expr->kind & ~Expr\BinaryOperator::KIND_ASSIGN] ?? '';
            switch ($expr->kind) {
                case Expr\BinaryOperator::KIND_ADD:
                    if ($left->type->indirections()) {
                        return $left->withCurrent('FFI::addr(' . $left->value . '[' . $right->toValue() . '])');
                    } else {
                        return new CompiledExpr('(' . $left->toValue() . ' + ' . $right->toValue() . ')');
                    }
                case Expr\BinaryOperator::KIND_SUB:
                    if (!$left->type->indirections() !== !$right->type->indirections()) {
                        return $left->withCurrent('FFI::addr(' . $left->value . '[-' . $right->toValue() . '])');
                    } else {
                        return new CompiledExpr('(' . $left->toValue() . ' - ' . $right->toValue() . ')');
                    }
                case Expr\BinaryOperator::KIND_MUL:
                case Expr\BinaryOperator::KIND_DIV:
                case Expr\BinaryOperator::KIND_REM:
                case Expr\BinaryOperator::KIND_SHL:
                case Expr\BinaryOperator::KIND_SHR:
                case Expr\BinaryOperator::KIND_LT:
                case Expr\BinaryOperator::KIND_GT:
                case Expr\BinaryOperator::KIND_LE:
                case Expr\BinaryOperator::KIND_GE:
                case Expr\BinaryOperator::KIND_EQ:
                case Expr\BinaryOperator::KIND_NE:
                case Expr\BinaryOperator::KIND_BITWISE_AND:
                case Expr\BinaryOperator::KIND_BITWISE_OR:
                case Expr\BinaryOperator::KIND_BITWISE_XOR:
                case Expr\BinaryOperator::KIND_LOGICAL_AND:
                case Expr\BinaryOperator::KIND_LOGICAL_OR:
                    return new CompiledExpr('(' . $left->toValue() . ' ' . $opChar . ' ' . $right->toValue() . ')');
                case Expr\BinaryOperator::KIND_COMMA:
                    return $right->withCurrent($left->value . ', ' . $right->value);
            }
            if ($expr->kind & Expr\BinaryOperator::KIND_ASSIGN) {
                return $left->withCurrent('(' . (($expr->left instanceof Expr\DimFetchExpr || ($expr->left instanceof Expr\UnaryOperator && $expr->left->kind === Expr\UnaryOperator::KIND_DEREF) || !$left->type->indirections()) && (!str_starts_with($left->value, '$this->') || str_starts_with($left->value, '$this->ffi')) ? $left->toValue() : 'FFI::addr(' . $left->value . ')[0]') . ' ' . $opChar . '= ' . $right->toValue($left->type) . ')');
            }
        }
        if ($expr instanceof Expr\CallExpr) {
            $args = [];
            foreach ($expr->args as $arg) {
                $args[] = $this->compileExpr($arg)->toValue();
            }
            if ($expr->fn instanceof Expr\DeclRefExpr && isset($this->knownFunctions[$expr->fn->name])) {
                $func = $this->knownFunctions[$expr->fn->name];
                $functionType = $func->type;
                while ($functionType instanceof Type\ExplicitAttributedType) {
                    $functionType = $functionType->parent;
                }
                $type = $this->compileType($functionType->return);
                return new CompiledExpr('$this->' . (isset($this->knownCompiledFunctions[$expr->fn->name]) ? self::COMPILED_PREFIX : 'ffi->') . $expr->fn->name . '(' . implode(', ', $args) . ')', $type);
            } elseif ($expr->fn instanceof Expr\DeclRefExpr && isset(BuiltinFunction::$registry[$expr->fn->name])) {
                $this->usedBuiltinFunctions[$expr->fn->name] = true;
                return new CompiledExpr('$this->' .self::COMPILED_PREFIX . $expr->fn->name . '(' . implode(', ', $args) . ')', BuiltinFunction::$registry[$expr->fn->name]->type);
            } else {
                $fn = $this->compileExpr($expr->fn);
                if (!($fn->type instanceof CompiledFunctionType)) {
                    throw new \LogicException('Tried to call non-function type ' . $fn->type->toValue());
                }
                return new CompiledExpr('(' . $fn->value . ')(' . implode(', ', $args) . ')', $fn->type->return);
            }
        }
        if ($expr instanceof Expr\DeclRefExpr) {
            // lookup to determine if it's a constant or not
            $name = $expr->name;
            if (isset($this->defines[$name])) {
                return new CompiledExpr('self::' . $name);
            }
            if (isset($this->localVariableTypes[$name])) {
                return new CompiledExpr('$' . $name, $this->localVariableTypes[$name], cdata: true);
            }
            if (isset($this->knownFunctions[$name])) {
                $func = $this->knownFunctions[$name];
                $functionType = $func->type;
                while ($functionType instanceof Type\ExplicitAttributedType) {
                    $functionType = $functionType->parent;
                }
                return new CompiledExpr('[$this' . (isset($this->knownCompiledFunctions[$name]) ? ', "' .self::COMPILED_PREFIX : '->ffi, "') . $name . '"]', $this->compileType($functionType));
            }
            if (isset($this->globalVariableTypes[$name])) {
                $var = $this->globalVariableTypes[$name];
                return new CompiledExpr('$this->' . (isset($this->compiledGlobalVariables[$name]) ? '' : 'ffi->') . $name, $var, cdata: true);
            }
            if (isset(BuiltinFunction::$registry[$name])) {
                $this->usedBuiltinFunctions[$name] = true;
                return new CompiledExpr('[$this, "' .self::COMPILED_PREFIX . $name . '"]', BuiltinFunction::$registry[$name]->type);
            }
            throw new \LogicException('Found unknown variable ' . $name);
        }
        if ($expr instanceof Expr\TypeRefExpr) {
            return new CompiledExpr($this->compileType($expr->type)->toValue());
        }
        if ($expr instanceof Expr\CastExpr) {
            $type = $this->compileType($expr->type->type);
            $op = $this->compileExpr($expr->expr);
            if ($type->value === 'void' && $type->indirections() === 0) {
                return $op;
            }
            if ($type->isNative) {
                return new CompiledExpr('((' . $this->toPHPType($type) . ') ' . $op->toValue() . ')');
            }
            return new CompiledExpr('$this->ffi->cast("' . $type->toValue() . '", ' . $op->value . ')', $type, cdata: true);
        }
        if ($expr instanceof Expr\DimFetchExpr) {
            $op = $this->compileExpr($expr->expr, isAssign: $isAssign);
            $dim = $this->compileExpr($expr->dimension)->toValue();
            $value = $op->value;
            if ($isAssign && (($expr->expr instanceof Expr\UnaryOperator && in_array($expr->expr->kind, [Expr\UnaryOperator::KIND_PREINC, Expr\UnaryOperator::KIND_POSTINC, Expr\UnaryOperator::KIND_PREDEC, Expr\UnaryOperator::KIND_POSTDEC])) || $expr->expr instanceof Expr\BinaryOperator)) {
                $value = "(fn() => $value)()";
            }
            return $op->withCurrent($value . '[' . $dim . ']', -1);
        }
        if ($expr instanceof Expr\StructRefExpr) {
            $op = $this->compileExpr($expr->expr);
            $type = $this->records[$op->type->value][$expr->memberName];
            return new CompiledExpr('(' . $op->value . ')->' . $expr->memberName, $type, cdata: true);
        }
        if ($expr instanceof Expr\StructDerefExpr) {
            $op = $this->compileExpr($expr->expr);
            $type = $this->records[$op->type->value][$expr->memberName];
            return new CompiledExpr('(' . $op->value . ')[0]->' . $expr->memberName, $type, cdata: true);
        }
        if ($expr instanceof Expr\StringLiteral) {
            return new CompiledExpr('$this->__allocCachedString(' . $this->formatString($expr->value) . ')', new CompiledType('int', [null], 'char'), cdata: true);
        }
        if ($expr instanceof Expr\InitializerExpr) {
            return $this->compileInitializer($this->compileType($expr->explicitType->type), $expr->initializers);
        }
        var_dump($expr);
    }

    /** @param Type[] $params
     *  @return CompiledType[]
     */
    public function compileParameters(array $params): array {
        if (empty($params)) {
            return [];
        } elseif ($params[0] instanceof Type\BuiltinType && $params[0]->name === 'void') {
            return [];
        }
        $return = [];
        foreach ($params as $param) {
            $return[] =  $this->compileType($param);
        }
        return $return;
    }

    private const INT_TYPES = [
        '_Bool',
        'int8_t',
        'uint8_t',
        'int16_t',
        'uint16_t',
        'int32_t',
        'uint32_t',
        'int64_t',
        'uint64_t',
        'size_t',
        'char',
        'short',
        'short int',
        'int',
        'long',
        'long long',
        'long int',
        'long long int',
        'unsigned',
        'unsigned char',
        'unsigned short',
        'unsigned short int',
        'unsigned int',
        'unsigned long',
        'unsigned long int',
        'unsigned long long',
        'unsigned long long int',
        '__int128',
        'unsigned __int128',
    ];

    private const FLOAT_TYPES = [
        'float',
        'double',
        'long double',
        '__float128',
    ];

    /** @param string[] $types
     *  @return string[][]
     */
    private function groupNativeTypesOfSameSize(array $types): array {
        $grouped = [];
        foreach ($types as $type) {
            if ($type !== 'char') { // special cased as string
                $size = $type === '_Bool' ? 'u1' : (($type[0] === 'u' ? 'u' : '') . (str_contains($type, "128") ? 16 : FFI::sizeof(FFI::type($type))));
                $grouped[$size][] = $type;
            }
        }
        return $grouped;
    }

    private const NATIVE_TYPES = [
        'int',
        'float',
    ];

    public function compileType(Type $type): CompiledType {
        if ($type instanceof Type\PointerType || $type instanceof Type\ArrayType) {
            $compiled = $this->compileType($type->parent);
            $typeIndex = null;
            if ($type instanceof Type\ArrayType\ConstantArrayType) {
                $typeIndex = $this->compileConstantExpr($type->size);
            } elseif ($type instanceof Type\ArrayType\VariableArrayType) {
                $typeIndex = $this->compileConstantExpr($type->size);
            } elseif ($type instanceof Type\ArrayType\IncompleteArrayType) {
                $typeIndex = false;
            }
            array_unshift($compiled->indirections, $typeIndex);
            $compiled->isNative = false;
            return $compiled;
        }
        if ($type instanceof Type\TypedefType) {
            $name = $type->name;
            restart:
            $fullName = $name;
            $name = preg_replace('((.*?)\b(?:(unsigned )|signed )(.+))', "$2$1$3", $name);
            if (in_array($name, self::INT_TYPES)) {
                $this->usedBuiltinTypes[$fullName] = true;
                return new CompiledType('int', rawValue: $fullName);
            }
            if (in_array($name, self::FLOAT_TYPES)) {
                $this->usedBuiltinTypes[$fullName] = true;
                return new CompiledType('float', rawValue: $fullName);
            }
            if (str_starts_with($name, "__builtin_")) {
                $this->usedBuiltinTypes[$name] = true;
                return new CompiledType($name);
            }
            if (isset($this->resolver[$name]) && $name !== $this->resolver[$name]) {
                $name = $this->resolver[$name];
                goto restart;
            }
            return new CompiledType($name);
        } elseif ($type instanceof Type\BuiltinType) {
            if ($type->name === 'void') {
                return new CompiledType('void');
            }
            // examples to sanitize: signed int, long signed int, long unsigned int.
            $normalizedSigned = preg_replace('((.*?)\b(?:(unsigned )|signed )(.+))', "$2$1$3", $type->name);
            if (in_array($normalizedSigned, self::INT_TYPES)) {
                $this->usedBuiltinTypes[$normalizedSigned] = true;
                return new CompiledType('int', rawValue: $normalizedSigned);
            }
            if (in_array($normalizedSigned, self::FLOAT_TYPES)) {
                $this->usedBuiltinTypes[$normalizedSigned] = true;
                return new CompiledType('float', rawValue: $normalizedSigned);
            }

            if (str_contains($type->name, "_Complex")) {
                throw new UnsupportedFeatureException(UnsupportedFeatureException::COMPLEX, "{$type->name} is not supported by ext/ffi");
            }
        } elseif ($type instanceof Type\TagType\EnumType) {
            $this->usedBuiltinTypes['int'] = true;
            return new CompiledType('int');
        } elseif ($type instanceof Type\AttributedType) {
            // TODO check which kinds need special handling
            return $this->compileType($type->parent);
        } elseif ($type instanceof Type\TagType\RecordType) {
            if ($type->decl->name !== null) {
                return new CompiledType(($type->decl->kind === Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl::KIND_UNION ? 'union' : 'struct') . ' ' . $type->decl->name);
            } else {
                $anonTypename = ($type->decl->kind === Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl::KIND_UNION ? 'union' : 'struct') . ' anonymous id ' . count($this->records);
                $this->recurseAnonymousFieldTypes($anonTypename, $type->decl, $this->records, $this->recordBitfieldSizes);
                return new CompiledType($anonTypename);
            }
        } elseif ($type instanceof Type\ParenType) {
            return $this->compileType($type->parent);
        } elseif ($type instanceof Type\FunctionType\FunctionProtoType) {
            $this->generateFunctionPtrDefs = true;
            return new CompiledFunctionType($this->compileType($type->return), array_map([$this, 'compileType'], $type->params), $type->isVariadic);
        }
        var_dump($type);
        throw new \LogicException('Not implemented how to handle type yet: ' . get_class($type));
    }

    public function toPHPType(CompiledType $type): string {
        $indirections = $type->indirections();
        $underscoredName = strtr($indirections === 0 ? $type->value : $type->rawValue, " ", "_");
        if ($indirections > 0) {
            // special case
            if ($type->rawValue === 'char') {
                // it's a string
                return 'string' . ($indirections === 1 ? '_' : '') . str_repeat('_ptr', $indirections - 1);
            }
            return $underscoredName . str_repeat('_ptr', $indirections);
        } else {
            return $underscoredName;
        }
    }

    public function toPHPValue(CompiledType $type, string $value): string {
        return 'new ' . $this->toPHPType($type) . '(' . $value . ($type instanceof CompiledFunctionType ? ', ' . $this->linearArrayExport($this->compilePHPFunctionTypeArray($type)) : '') . ')';
    }

    /** @return string[] */
    public function compileDeclClass(Decl $decl): array {
        $returns = [];
        if ($decl instanceof Decl\NamedDecl\TypeDecl\TypedefNameDecl\TypedefDecl) {
            if ($decl->type instanceof Type\TagType\EnumType || ($decl->type instanceof Type\TagType\RecordType && $decl->type->decl->name === null)) {
                // don't compile enums or typedef'ed unnamed structs
                return [];
            }
            $baseType = $this->compileType($decl->type);
            if ($baseType->isNative) {
                $baseType->indirections[] = null;
            }
            $phpType = $this->toPHPType($baseType);
            $baseIndirections = $baseType->indirections() + ($this->baseTypeIndirections[$baseType->value] ?? 0);
            $this->baseTypeIndirections[$decl->name] = $baseIndirections;
            for ($i = $baseIndirections === 0 && $phpType === 'void' ? 1 : 0; $i <= 4 - $baseIndirections; $i++) {
                $returns[] = '\class_alias(__NAMESPACE__ . "\\\\' . ($phpType === 'string_' && $i > 0 ? 'string' : $phpType) . str_repeat('_ptr', $i) . '", __NAMESPACE__ . "\\\\' . $decl->name . str_repeat('_ptr', $i + ($baseType->isNative ? 1 : 0)) . '");';
            }
        }
        return $returns;
    }

    public function compilePHPFunctionTypeArray(CompiledFunctionType $type): array {
        if ($type->return instanceof CompiledFunctionType) {
            $ret = $this->compilePHPFunctionTypeArray($type->return);
            array_unshift($ret, "function_type" . str_repeat("_ptr", $type->return->indirections()));
        } elseif ($type->return->value === 'void') {
            $ret = null;
        } else {
            $ret = $this->toPHPType($type);
        }
        $func = [$ret];
        foreach ($type->args as $arg) {
            if ($arg instanceof CompiledFunctionType) {
                $funcArg = $this->compilePHPFunctionTypeArray($arg);
                array_unshift($funcArg, "function_type" . str_repeat("_ptr", $arg->indirections()));
            } else {
                $funcArg = $this->toPHPType($arg);
            }
            $func[] = $funcArg;
        }
        return $func;
    }

    protected function linearArrayExport(array $array) {
        foreach ($array as $value) {
            $buf[] = \is_array($value) ? $this->linearArrayExport($array) : var_export($value, true);
        }
        return '[' . implode(', ', $buf) . ']';
    }

    /** @return string[] */
    protected function compileDeclClassImpl(string $name, CompiledType $type): array {
        if ($type instanceof CompiledFunctionType) {
            $return[] = "class {$name} extends function_type" . str_repeat("_ptr", $type->indirections()) ." {";
            $return[] = '    public function __construct(FFI\CData $data) { parent::__construct($data, ' . $this->linearArrayExport($this->compilePHPFunctionTypeArray($type)) . '); }';
            $return[] = '    public static function getType(): string { return ' . var_export($type->toValue(), true) . '; }';
            $return[] = '}';
            return $return;
        }

        $recordType = $type->indirections() <= 1 && !$type->baseTypeIsNative();
        $dereferencable = $type->indirections() >= 1 && $name !== 'void_ptr';

        if ($recordType && $record = $this->records[$type->value] ?? null) {
            $return[] = '/**';
            foreach ($record as $field => $fieldType) {
                $return[] = ' * @property ' . $this->toPHPType($fieldType) . ' $' . $field;
            }
            $return[] = ' */';
        }
        $return[] = "class {$name} implements i{$this->className}" . ($type->indirections() ? ", i{$this->className}_ptr" : "") . ($dereferencable ? ", \ArrayAccess" : "") . " {";
        $return[] = '    private FFI\CData $data;';
        $return[] = '    public function __construct(FFI\CData $data) { $this->data = $data; }';
        $return[] = '    public function getData(): FFI\CData { return $this->data; }';
        $return[] = '    public function equals(' . $name . ' $other): bool { return $this->data == $other->data; }';
        $nameWithPtr = $name . '_ptr';
        if ($name === 'string_') {
            $nameWithPtr = 'string_ptr';
        }
        $return[] = '    public function addr(): ' . $nameWithPtr . ' { return new '. $nameWithPtr . '(FFI::addr($this->data)); }';
        if ($dereferencable) {
            $prior = substr($name, 0, -4);
            $return[] = '    #[\ReturnTypeWillChange] public function offsetGet($offset): ' . $prior . ' { return $this->deref($offset); }';
            $return[] = '    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }';
            $return[] = '    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }';
            $return[] = '    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = ' . ($type->indirections() === 1 && $type->baseTypeIsNative() ? $type->rawValue === 'char' ? '\chr($value)' : '$value' : '$value->getData()') . '; }';
            if ($prior === 'string') {
                $prior = 'string_';
            }
            if ($type->baseTypeIsNative() && $type->indirections() === 1) {
                if ($type->value === 'int') {
                    $return[] = '    public function deref(int $n = 0): int { return ' . ($type->rawValue === 'char' ? '\ord($this->data[$n])' : '$this->data[$n]') . '; }';
                } elseif ($type->value === 'float') {
                    $return[] = '    public function deref(int $n = 0): float { return $this->data[$n] + 0.0; }';
                } else {
                    // this is wrong, but unsure how to handle it...
                    $return[] = '    public function deref(int $n = 0) { return $this->data[$n]; }';
                }
            } else {
                $return[] = '    public function deref(int $n = 0): ' . $prior . ' { return new ' . $prior . '($this->data[$n]); }';
            }
        }
        if ($name === 'string_') {
            $return[] = '    public function toString(?int $length = null): string { return $length === null ? FFI::string($this->data) : FFI::string($this->data, $length); }';
            $return[] = '    public static function persistent(string $string): self { $str = new self(FFI::new("char[" . \strlen($string) . "]", false)); FFI::memcpy($str->data, $string, \strlen($string)); return $str; }';
            $return[] = '    public static function owned(string $string): self { $str = new self(FFI::new("char[" . \strlen($string) . "]", true)); FFI::memcpy($str->data, $string, \strlen($string)); return $str; }';
            $return[] = '    public static function persistentZero(string $string): self { return self::persistent("$string\0"); }';
            $return[] = '    public static function ownedZero(string $string): self { return self::owned("$string\0"); }';
        }
        if ($recordType && $record) {
            $return[] = '    public function __get($prop) {';
            $return[] = '        switch ($prop) {';
            $deref = $type->indirections() === 1 ? '[0]' : '';
            foreach ($record as $field => $fieldType) {
                $return[] = '            case "' . $field . '": return ' . ($fieldType->isNative ? $fieldType->rawValue === 'char' ? '\ord($this->data' . $deref . '->' . $field . ')' : ('$this->data' . $deref . '->' . $field) : ('new ' . $this->toPHPType($fieldType) . '($this->data' . $deref . '->' . $field . ($fieldType instanceof CompiledFunctionType ? ', ' . $this->linearArrayExport($this->compilePHPFunctionTypeArray($fieldType)) : '') . ')')) . ';';
            }
            $return[] = '        }';
            $return[] = '        throw new \Error("Unknown field $prop on type " . self::getType());';
            $return[] = '    }';

            $return[] = '    public function __set($prop, $value) {';
            $return[] = '        switch ($prop) {';
            $deref = $type->indirections() === 1 ? '[0]' : '';
            foreach ($record as $field => $fieldType) {
                $return[] = '            case "' . $field . '":';
                if ($fieldType->isNative) {
                    $return[] = '                $this->data' . $deref . '->' . $field . ' = ' . ($fieldType->rawValue === 'char' ? '\chr($value)' : '$value') . ';';
                } else {
                    $return[] = '                (new ' . $this->toPHPType($fieldType) . '($this->data' . $deref . '->' . $field . ($fieldType instanceof CompiledFunctionType ? ', ' . $this->linearArrayExport($this->compilePHPFunctionTypeArray($fieldType)) : '') . '))->set($value);';
                }
                $return[] = '                break;';
            }
            $return[] = '        }';
            $return[] = '        throw new \Error("Unknown field $prop on type " . self::getType());';
            $return[] = '    }';
        }
        $return[] = '    public function set(' . ($type->baseTypeIsNative() && $type->indirections() === 1 ? $type->value . ' | ' : '') . ($name !== 'void_ptr' ? ($type->indirections() > 0 ? "void_ptr | " : "") . $name : "i{$this->className}_ptr") . ' $value): void {';
        if ($type->baseTypeIsNative() && $type->indirections() === 1) {
            $return[] = '        if (\is_scalar($value)) {';
            $return[] = '            $this->data[0] = ' . ($type->rawValue === 'char' ? '\chr($value)' : '$value') . ';';
            $return[] = '        } else {';
            $return[] = '            FFI::addr($this->data)[0] = $value->getData();';
            $return[] = '        }';
        } else {
            $return[] = '        FFI::addr($this->data)[0] = $value->getData();';
        }
        $return[] = '    }';
        $return[] = '    public static function getType(): string { return ' . var_export($type->toValue(), true) . '; }';
        $return[] = '    public function getDefinition(): string { return static::getType(); }';
        $return[] = '}';
        return $return;
    }

    /** @return string[] */
    protected function compileFunctionPtrClassImpl(int $indirections): array {
        $name = "function_type" . str_repeat("_ptr", $indirections);

        // function type: [null_or_return_class_name, arg1_class_name, arg2_class_name] - nested function types represented as nested array: ["function_type_ptr(_ptr)*", arg1_class_name, arg2_class_name]
        $return[] = "class $name implements i{$this->className}, i{$this->className}_ptr" . ($indirections > 1 ? ', \ArrayAccess' : "") . " {";
        $return[] = '    private FFI\CData $data;';
        $return[] = '    private array $types;';
        $return[] = '    public function __construct(FFI\CData $data, array $types) { $this->data = $data; $this->types = $types; }';
        $return[] = '    public function getData(): FFI\CData { return $this->data; }';
        $return[] = '    public function equals(' . $name . ' $other): bool { return $this->data == $other->data; }';
        $return[] = '    public function addr(): ' . $name . '_ptr { return new '. $name . '_ptr(FFI::addr($this->data)); }';
        if ($indirections > 1) {
            $prior = substr($name, 0, -4);
            $return[] = '    #[\ReturnTypeWillChange] public function offsetGet($offset): ' . $prior . ' { return $this->deref($offset); }';
            $return[] = '    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }';
            $return[] = '    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }';
            $return[] = '    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->deref($offset)->set($value); }';
            $return[] = '    public function deref(int $n = 0): ' . $prior . ' { return new ' . $prior . '($this->data[$n], $this->types); }';
            $return[] = '    public function set(void_ptr | ' . $name . ' $value): void {';
            $return[] = '        if ($value instanceof ' . $name . ' && $value->types != $this->types) {';
            $return[] = '            throw new \TypeError("Cannot assign " . get_class($value) . " with type signature " . json_encode($value->types) . " to " . get_class($this) . " with type signature " . json_encode($this->types));';
            $return[] = '        }';
            $return[] = '        FFI::addr($this->data)[0] = $value;';
            $return[] = '    }';
        } else {
            $return[] = '    public function set(callable | void_ptr | ' . $name . ' $value): void {';
            $return[] = '        if ($value instanceof void_ptr) {';
            $return[] = '            $value = $value->getData();';
            $return[] = '        } elseif ($value instanceof ' . $name . ') {';
            $return[] = '            if ($value->types != $this->types) {';
            $return[] = '                throw new \TypeError("Cannot assign " . get_class($value) . " with type signature " . json_encode($value->types) . " to " . get_class($this) . " with type signature " . json_encode($this->types));';
            $return[] = '            }';
            $return[] = '            $value = $value->getData();';
            $return[] = '        } else {';
            $return[] = '            $types = $this->types;';
            $return[] = '            $value = static function (...$args) use ($value, $types) {';
            $return[] = '                foreach ($args as $i => $arg) {';
            $return[] = '                    $type = $types[$i + 1];';
            $return[] = '                    if ($type === "char") {';
            $return[] = '                        $args[$i] = \chr($arg);';
            $return[] = '                    } elseif (\is_array($type)) {';
            $return[] = '                        $args[$i] = new (__NAMESPACE__ . "\\\\" . $type[0])($arg, array_slice($type, 1));';
            $return[] = '                    } elseif ($type !== "int" && $type !== "float") {';
            $return[] = '                        $args[$i] = new (__NAMESPACE__ . "\\\\" . $type)($arg);';
            $return[] = '                    }';
            $return[] = '                }';
            $return[] = '                $ret = $value(...$args);';
            $return[] = '                if ($types[0] === "int" || $types === "float") {';
            $return[] = '                    return $ret;';
            $return[] = '                } elseif ($types[0] === "char") {';
            $return[] = '                    return \chr($ret);';
            $return[] = '                } elseif ($types[0] !== null) {';
            $return[] = '                    return $ret->getData();';
            $return[] = '                }';
            $return[] = '            };';
            $return[] = '        }';
            $return[] = '        FFI::addr($this->data)[0] = $value;';
            $return[] = '    }';
        }
        $return[] = '    public static function getType(): string { return "(' . str_repeat('*', $indirections) . ')"; }';
        $return[] = '    public function getDefinition(): string { return ($this->types[0] !== null ? \is_array($this->types[0]) ? (new (__NAMESPACE__ . "\\\\" . $this->types[0][0])($this->data, array_slice($this->types[0], 1)))->getDefinition() : $this->types[0]::getType() : "void") . "(' . str_repeat('*', $indirections) . ')(" . implode(", ", array_map(function($t) { return \is_array($t) ? (new (__NAMESPACE__ . "\\\\" . $t[0])($this->data, array_slice($t, 1)))->getDefinition() : $t::getType(); }, array_slice($this->types, 1))) . ")"; }';
        $return[] = '}';
        return $return;
    }

    /** @param Decl[] $decls
     *  @return string[]
     */
    protected function buildResolver(array $decls): array {
        $toLookup = [];
        $result = [];
        foreach ($decls as $decl) {
            if ($decl instanceof Decl\NamedDecl\TypeDecl\TypedefNameDecl\TypedefDecl) {
                if ($decl->type instanceof Type\TypedefType) {
                    $toLookup[] = [$decl->name, $decl->type->name];
                } elseif ($decl->type instanceof Type\TagType\RecordType) {
                    $result[$decl->name] = isset($decl->type->decl->name) ? ($decl->type->decl->kind === Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl::KIND_UNION ? 'union' : 'struct') . ' ' . $decl->type->decl->name : $decl->name;
                } elseif ($decl->type instanceof Type\BuiltinType) {
                    $result[$decl->name] = $decl->type->name;
                } elseif ($decl->type instanceof Type\TagType\EnumType) {
                    $result[$decl->name] = 'int';
                }
            }
        }
        /**
         * This resolves chained typedefs. For example:
         * typedef int A;
         * typedef A B;
         * typedef B C;
         *
         * This will resolve C=>int, B=>int, A=>int
         *
         * It runs a maximum of 50 times (to prevent things that shouldn't be possible, like circular references)
         */
        $runs = 50;
        while ($runs-- > 0 && !empty($toLookup)) {
            $toRemove = [];
            for ($i = 0, $n = count($toLookup); $i < $n; $i++) {
                list($name, $ref) = $toLookup[$i];

                if (isset($result[$ref])) {
                    $result[$name] = $result[$ref];
                    $toRemove[] = $i;
                }
            }
            foreach ($toRemove as $index) {
                unset($toLookup[$index]);
            }
            if (empty($toRemove)) {
                // We removed nothing, so don't bother rerunning
                break;
            } else {
                $toLookup = array_values($toLookup);
            }
        }
        return $result;
    }

    /** @param CompiledType[][] $records */
    private function recurseAnonymousFieldTypes(string $recordName, Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl $decl, array &$records, array &$bitfieldSizes): void {
        $records[$recordName] ??= [];
        foreach ($decl->fields ?? [] as $field) {
            if ($field->type) {
                if ($field->type instanceof Type\TagType\RecordType && $field->type->decl->name === null) {
                    $this->recurseAnonymousFieldTypes($recordName, $field->type->decl, $records, $bitfieldSizes);
                } elseif ($field->name != "") {
                    $records[$recordName][$field->name] = $this->compileType($field->type);
                    if ($field->bitfieldSize) {
                        $bitfieldSizes[$recordName][$field->name] = $this->compileConstantExpr($field->bitfieldSize);
                    }
                }
            }
        }
    }

    /** @param Decl[] $decls
     *  @return array{CompiledType[][], int[][]}
     */
    protected function buildRecordFieldTypeMap(array $decls): array {
        $records = [];
        $bitfieldSizes = [];
        foreach ($decls as $decl) {
            if ($decl instanceof Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl) {
                $this->recurseAnonymousFieldTypes(($decl->kind === Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl::KIND_UNION ? 'union' : 'struct') . ' ' . $decl->name, $decl, $records, $bitfieldSizes);
            }
            if ($decl instanceof Decl\NamedDecl\TypeDecl\TypedefNameDecl\TypedefDecl) {
                if ($decl->type instanceof Type\TagType\RecordType) {
                    $name = isset($decl->type->decl->name) ? ($decl->type->decl->kind === Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl::KIND_UNION ? 'union' : 'struct') . ' ' . $decl->type->decl->name : $decl->name;
                    $this->recurseAnonymousFieldTypes($name, $decl->type->decl, $records, $bitfieldSizes);
                }
            }
        }
        return [$records, $bitfieldSizes];
    }
}
