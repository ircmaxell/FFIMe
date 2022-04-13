<?php

declare(strict_types=1);

namespace FFIMe;
use PHPCParser\Node\Decl;
use PHPCParser\Node\Stmt;
use PHPCParser\Node\Type;
use PHPCParser\Printer;
use PHPCParser\Node\Stmt\ValueStmt\Expr;

class Compiler {

    const COMPILED_PREFIX = "_ffi_internal_";

    private array $defines;
    private array $resolver;
    /** @var CompiledType[] */
    private array $localVariableTypes = [];
    private array $globalVariableTypes = [];
    /** @var CompiledType[] */
    private array $records = [];
    private array $knownFunctions = [];
    private array $knownCompiledFunctions = [];

    public function compile(string $soFile, array $decls, array $definitions, array $defines, string $className): string {
        $this->defines = $defines;
        $this->resolver = $this->buildResolver($decls);
        $this->records = $this->buildRecordFieldTypeMap($decls);
        $parts = explode('\\', $className);
        $class = [];
        if (isset($parts[1])) {
            $className = array_pop($parts);
            $namespace = implode('\\', $parts);
            $class[] = "namespace " . $namespace . ";";
            $class[] = "use FFI;";
        }
        $class[] = "interface i{$className} {}";
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
        $class[] = $this->compileConstructor();
        $class[] = $this->compileMethods($className);
        $class[] = "    public function __get(string \$name) {";
        $class[] = "        switch(\$name) {";
        foreach ($this->compileCases($decls) as $case) {
            $class[] = "            $case";
        }
        $class[] = "            default: return \$this->ffi->\$name;";
        $class[] = "        }";
        $class[] = "    }";
        $class[] = '    public function __allocCachedString(string $str): FFI\CData {';
        $class[] = '        return $this->__literalStrings[$str] ??= string_::ownedZero($str)->getData();';
        $class[] = '    }';
        foreach ($decls as $decl) {
            $class = array_merge($class, $this->compileDecl($decl));
        }
        foreach ($definitions as $def) {
            $class = array_merge($class, $this->compileDef($def));
        }
        $class[] = "}\n";
        $class = array_merge($class, $this->compileDeclClassImpl('string_', 'char*', $className));
        $class = array_merge($class, $this->compileDeclClassImpl('string_ptr', 'char**', $className));
        $class = array_merge($class, $this->compileDeclClassImpl('string_ptr_ptr', 'char***', $className));
        $class = array_merge($class, $this->compileDeclClassImpl('string_ptr_ptr_ptr', 'char****', $className));
        $class = array_merge($class, $this->compileDeclClassImpl('int_ptr', 'int*', $className));
        $class = array_merge($class, $this->compileDeclClassImpl('int_ptr_ptr', 'int**', $className));
        $class = array_merge($class, $this->compileDeclClassImpl('int_ptr_ptr_ptr', 'int***', $className));
        $class = array_merge($class, $this->compileDeclClassImpl('void_ptr', 'void*', $className));
        $class = array_merge($class, $this->compileDeclClassImpl('void_ptr_ptr', 'void**', $className));
        $class = array_merge($class, $this->compileDeclClassImpl('void_ptr_ptr_ptr', 'void***', $className));
        foreach ($decls as $decl) {
            $class = array_merge($class, $this->compileDeclClass($decl, $className));
        }
        return implode("\n", $class);
    }

    public function compileCases(array $decls): array {
        $results = [];
        foreach ($decls as $decl) {
            if ($decl instanceof Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl) {
                $return = $this->toPHPType($this->compileType($decl->type));
                if (in_array($return, self::NATIVE_TYPES)) {
                    $results[] = "case " . var_export($decl->name, true) . ": return \$this->ffi->{$decl->name};";
                } else {
                    $results[] = "case " . var_export($decl->name, true) . ": \$tmp = \$this->ffi->{$decl->name}; return \$tmp === null ? null : new $return(\$tmp);";
                }
            }
        }
        return $results;
    }

    protected function compileConstructor(): string {
        return '    public function __construct(string $pathToSoFile = self::SOFILE) {
        $this->ffi = FFI::cdef(self::HEADER_DEF, $pathToSoFile);
    }';
    }

    protected function compileMethods(string $className): string {
        return '    
    public function cast(i'. $className . ' $from, string $to): i' . $className . ' {
        if (!is_a($to, i' . $className . '::class)) {
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
        if (is_object($classOrObject) && $classOrObject instanceof i' . $className . ') {
            return $this->ffi->sizeof($classOrObject->getData());
        } elseif (is_a($classOrObject, i' . $className . '::class)) {
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
    
    public function compileDeclsToCode(array $decls): string {
        // TODO
        $printer = new Printer\C;
        return $printer->printNodes($decls, 0);
    }

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
            if ($returnType !== 'void') {
                $return[] = '        $result = $this->' . self::COMPILED_PREFIX . $def->name . '(' . implode(', ', $callParams) . ');';
                if (in_array($returnType, self::NATIVE_TYPES)) {
                    $return[] = '        return $result;';
                } else {
                    $return[] = '        return $result === null ? null : new ' . $returnType . '($result);';
                }
            } else {
                $return[] = '        $this->' . self::COMPILED_PREFIX . $def->name . '(' . implode(', ', $callParams) . ');';
            }
            $return[] = "    }";

            $nullableReturnType = $returnType === 'void' ? 'void' : '?' . (in_array($returnType, self::NATIVE_TYPES) ? $returnType : 'FFI\CData');
            $paramSignature = [];
            foreach ($params as $idx => $param) {
                $varname = $functionType->paramNames[$idx] ?: "_$idx";
                $paramSignature[] = (in_array($param->value, self::NATIVE_TYPES) && $param->pointer === 0 ? $param->value : 'FFI\CData') . ' $' . $varname;
            }
            $return[] = "    private function " . self::COMPILED_PREFIX . "{$def->name}(" . implode(', ', $paramSignature) . "): " . $nullableReturnType . " {";
            $return = array_merge($return, $this->compileStmt($def->stmts));
            $return[] = "    }";
        }
        return $return;
    }

    public function compileStmt(Stmt $stmt, $level = 2): array {
        $result = [];
        if ($stmt instanceof Stmt\CompoundStmt) {
            foreach ($stmt->stmts as $stmt) {
                $result = array_merge($result, $this->compileStmt($stmt, $level));
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
            } elseif ($stmt instanceof Stmt\LoopStmt) {
                if ($stmt->condition && !$stmt->initStmt && !$stmt->loopExpr) {
                    $loop = 'while (' . $this->compileExpr($stmt->condition)->value . ')';
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
                    $loop .= ';' . ($stmt->condition ? ' ' . $this->compileExpr($stmt->condition)->value : '') . ';' . ($stmt->loopExpr ? ' ' . $this->compileExpr($stmt->loopExpr)->value : '') . ')';
                }
                $result[] = str_repeat(' ', $level * 4) . $loop . ' {';
                $result = array_merge($result, $this->compileStmt($stmt->loopStmt, $level + 1));
                $result[] = str_repeat(' ', $level * 4) . '}';
            } else {
                var_dump($stmt);
            }
        }
        return $result;
    }

    public function compileDeclStmt(Stmt\DeclStmt $stmt): array {
        $result = [];
        foreach ($stmt->declarations->declarations as $decl) {
            if ($decl instanceof Decl\NamedDecl\ValueDecl\DeclaratorDecl\VarDecl) {
                $varType = $this->compileType($decl->type);
                if ($decl->initializer) {
                    $expr = $this->compileExpr($decl->initializer);
                    $val = $expr->value;
                    if ($expr->type != $varType && $expr->type->pointer) {
                        $val = '$this->ffi->cast("' . $varType->rawValue . str_repeat('*', $varType->pointer) . '", ' . $val . ')';
                    }
                    $result[] = '$' . $decl->name . ' = ' . $val;
                } elseif ($varType->pointer) {
                    $result[] = '$' . $decl->name . ' = $this->ffi->new("' . $varType->rawValue . str_repeat('*', $varType->pointer) . '")';
                }
                $this->localVariableTypes[$decl->name] = $varType;
            } else {
                var_dump($decl);
            }
        }
        return $result;
    }

    public function compileDecl(Decl $declaration): array {
        $return = [];
        if ($declaration instanceof Decl\NamedDecl\ValueDecl\DeclaratorDecl\FunctionDecl) {
            [$return, $functionType, $params, $returnType] = $this->compileFunctionStart($declaration);

            $callParams = [];
            foreach ($params as $idx => $param) {
                $callParams[] = '$' . ($functionType->paramNames[$idx] ?: "_$idx");
            }
            if ($returnType !== 'void') {
                $return[] = '        $result = $this->ffi->' . $declaration->name . '(' . implode(', ', $callParams) . ');';
                if (in_array($returnType, self::NATIVE_TYPES)) {
                    $return[] = '        return $result;';
                } else {
                    $return[] = '        return $result === null ? null : new ' . $returnType . '($result);';
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
        if (substr($declaration->name ?? "", 0, 2) === '__') {
            return [];
        }
        return $return;
    }

    public function compileFunctionStart(Decl\NamedDecl\ValueDecl\DeclaratorDecl\FunctionDecl $decl): array {
        $this->knownFunctions[$decl->name] = $decl;
        $functionType = $decl->type;
        while ($functionType instanceof Type\ExplicitAttributedType) {
            $functionType = $functionType->parent;
        }
        $returnType = $this->toPHPType($this->compileType($functionType->return));
        $params = $this->compileParameters($functionType->params);
        $nullableReturnType = $returnType === 'void' ? 'void' : '?' . $returnType;
        $paramSignature = [];
        foreach ($params as $idx => $param) {
            $varname = $functionType->paramNames[$idx] ?: "_$idx";
            $phpParam = $this->toPHPType($param);
            $paramSignature[] = $phpParam . ' | null' . ($phpParam === 'string_' ? ' | string' : '') . ($param->pointer >= 1 ? ' | array' : '') . ' $' . $varname;
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
            if ($param->pointer >= 1) {
                $return[] = '        ' . ($hasIf ? '} else' : '') . 'if (\is_array($' . $varname . ')) {';
                $return[] = '            $_ = $this->ffi->new("' . $param->rawValue . str_repeat("*", $param->pointer - 1) . '[" . \count($' . $varname . ') . "]");';
                $return[] = '            foreach (\array_values($' . $varname . ') as $_k => $_v) {';
                $return[] = '                $_[$_k] = $_v' . ($param->pointer == 1 && in_array($param->value, self::NATIVE_TYPES) ? '' : '->getData()') . ';';
                $return[] = '            }';
                $return[] = '            $' . $varname . ' = $_;';
                $hasIf = true;
            }
            if (!in_array($param->value, self::NATIVE_TYPES) || $param->pointer > 0) {
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
            $op = $this->compileExpr($expr->expr, isAddrOf: $expr->kind === Expr\UnaryOperator::KIND_ADDRESS_OF);
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
                    return $op->withCurrent('(' . $op->value . '--)');
                case Expr\UnaryOperator::KIND_POSTINC:
                    return $op->withCurrent('(' . $op->value . '++)');
                case Expr\UnaryOperator::KIND_PREDEC:
                    return $op->withCurrent('(--' . $op->value . ')');
                case Expr\UnaryOperator::KIND_PREINC:
                    return $op->withCurrent('(++' . $op->value . ')');
                case Expr\UnaryOperator::KIND_ADDRESS_OF:
                    return $op->withCurrent('FFI::addr(' . $op->value . ')', 1);
                case Expr\UnaryOperator::KIND_DEREF:
                    return $op->withCurrent($isAssign || !$op->type->isChar ? $op->value . '[0]' : '\ord(' . $op->value . '[0])', -1);
                case Expr\UnaryOperator::KIND_ALIGNOF:
                    return new CompiledExpr('FFI::alignof(' . $op->value . ')');
                case Expr\UnaryOperator::KIND_SIZEOF:
                    return new CompiledExpr('FFI::sizeof(' . $op->value . ')');
                default:
                    throw new \LogicException("Unsupported unary operator for library: " . $expr->kind);
            }
        }
        if ($expr instanceof Expr\BinaryOperator) {
            $left = $this->compileExpr($expr->left, isAssign: $expr->kind === Expr\BinaryOperator::KIND_ASSIGN);
            $right = $this->compileExpr($expr->right);
            switch ($expr->kind) {
                case Expr\BinaryOperator::KIND_ADD:
                    return $left->withCurrent('(' . $left->value . ' + ' . $right->toValue() . ')');
                case Expr\BinaryOperator::KIND_SUB:
                    return !$left->type->pointer === !$right->type->pointer ? new CompiledExpr('(' . $left->value . ' - ' . $right->value . ')') : $left->withCurrent('(' . $left->value . ' - ' . $right->toValue() . ')');
                case Expr\BinaryOperator::KIND_MUL:
                    return new CompiledExpr('(' . $left->toValue() . ' * ' . $right->toValue() . ')');
                case Expr\BinaryOperator::KIND_DIV:
                    return new CompiledExpr('(' . $left->toValue() . ' / ' . $right->toValue() . ')');
                case Expr\BinaryOperator::KIND_REM:
                    return new CompiledExpr('(' . $left->toValue() . ' % ' . $right->toValue() . ')');
                case Expr\BinaryOperator::KIND_SHL:
                    return new CompiledExpr('(' . $left->toValue() . ' << ' . $right->toValue() . ')');
                case Expr\BinaryOperator::KIND_SHR:
                    return new CompiledExpr('(' . $left->toValue() . ' >> ' . $right->toValue() . ')');
                case Expr\BinaryOperator::KIND_LT:
                    return new CompiledExpr('(' . $left->toValue() . ' < ' . $right->toValue() . ')');
                case Expr\BinaryOperator::KIND_GT:
                    return new CompiledExpr('(' . $left->toValue() . ' > ' . $right->toValue() . ')');
                case Expr\BinaryOperator::KIND_LE:
                    return new CompiledExpr('(' . $left->toValue() . ' <= ' . $right->toValue() . ')');
                case Expr\BinaryOperator::KIND_GE:
                    return new CompiledExpr('(' . $left->toValue() . ' >= ' . $right->toValue() . ')');
                case Expr\BinaryOperator::KIND_EQ:
                    return new CompiledExpr('(' . $left->toValue() . ' == ' . $right->toValue() . ')');
                case Expr\BinaryOperator::KIND_NE:
                    return new CompiledExpr('(' . $left->toValue() . ' != ' . $right->toValue() . ')');
                case Expr\BinaryOperator::KIND_BITWISE_AND:
                    return new CompiledExpr('(' . $left->toValue() . ' & ' . $right->toValue() . ')');
                case Expr\BinaryOperator::KIND_BITWISE_OR:
                    return new CompiledExpr('(' . $left->toValue() . ' | ' . $right->toValue() . ')');
                case Expr\BinaryOperator::KIND_BITWISE_XOR:
                    return new CompiledExpr('(' . $left->toValue() . ' ^ ' . $right->toValue() . ')');
                case Expr\BinaryOperator::KIND_LOGICAL_AND:
                    return new CompiledExpr('(' . $left->toValue() . ' && ' . $right->toValue() . ')');
                case Expr\BinaryOperator::KIND_LOGICAL_OR:
                    return new CompiledExpr('(' . $left->toValue() . ' || ' . $right->toValue() . ')');
                case Expr\BinaryOperator::KIND_COMMA:
                    return $right->withCurrent($left->value . ', ' . $right->value);
                case Expr\BinaryOperator::KIND_ASSIGN:
                    $rightVal = $right->value;
                    if ($right->type != $left->type && $right->type->pointer) {
                        $rightVal = 'FFI::cast("' . $left->type->rawValue . str_repeat('*', $left->type->pointer) . '", ' . $rightVal . ')';
                    }
                    if ($left->type->pointer === 0 && $right->type->pointer === 0 && $left->type->isChar && !$right->type->isChar) {
                        $rightVal = '\chr(' . $rightVal . ')';
                    }
                    return $left->withCurrent('(' . $left->value . ' = ' . $rightVal . ')');
            }
        }
        if ($expr instanceof Expr\CallExpr) {
            $args = [];
            foreach ($expr->args as $arg) {
                $args[] = $this->compileExpr($arg)->value;
            }
            if ($expr->fn instanceof Expr\DeclRefExpr && isset($this->knownFunctions[$expr->fn->name])) {
                $func = $this->knownFunctions[$expr->fn->name];
                $functionType = $func->type;
                while ($functionType instanceof Type\ExplicitAttributedType) {
                    $functionType = $functionType->parent;
                }
                $type = $this->compileType($functionType->return);
                return new CompiledExpr('$this->' . (isset($this->knownCompiledFunctions[$expr->fn->name]) ? self::COMPILED_PREFIX : 'ffi->') . $expr->fn->name . '(' . implode(', ', $args) . ')', $type);
            } else {
                // TODO improve type of dynamic functions
                $fn = $this->compileExpr($expr->fn);
                return $fn->withCurrent('(' . $fn->value . ')(' . implode(', ', $args) . ')', -1);
            }
        }
        if ($expr instanceof Expr\DeclRefExpr) {
            // lookup to determine if it's a constant or not
            if (isset($this->defines[$expr->name])) {
                return new CompiledExpr('self::' . $expr->name);
            }
            if (isset($this->localVariableTypes[$expr->name])) {
                return new CompiledExpr('$' . $expr->name, $this->localVariableTypes[$expr->name]);
            }
            if (isset($this->globalVariableTypes[$expr->name])) {
                $var = $this->globalVariableTypes[$expr->name];
                return new CompiledExpr('$this->ffi->' . $expr->name, $var);
            }
            throw new \LogicException('Found unknown variable ' . $expr->name);
        }
        if ($expr instanceof Expr\CastExpr) {
            $type = $this->compileType($expr->type->type);
            $op = $this->compileExpr($expr->expr);
            if ($type->value === 'void' && $type->pointer === 0) {
                return $op;
            }
            if ($type->pointer === 0) {
                return new CompiledExpr('((' . $this->toPHPType($type) . ') ' . $op->toValue() . ')');
            }
            return new CompiledExpr('$this->ffi->cast("' . $type->value . str_repeat('*', $type->pointer) . '", ' . $op->value . ')', $type);
        }
        if ($expr instanceof Expr\DimFetchExpr) {
            $op = $this->compileExpr($expr->expr, isAssign: $isAssign);
            $dim = $this->compileExpr($expr->dimension)->value;
            return $op->withCurrent($isAssign || !$op->type->isChar ? $op->value . '[' . $dim . ']' : '\ord(' . $op->value . '[' . $dim . '])', -1);
        }
        if ($expr instanceof Expr\StructRefExpr) {
            $op = $this->compileExpr($expr->expr);
            $type = $this->records[$op->type->value][$expr->memberName];
            return new CompiledExpr('(' . $op->value . ')->' . $expr->memberName, $type);
        }
        if ($expr instanceof Expr\StringLiteral) {
            return new CompiledExpr('$this->__allocCachedString(' . $this->formatString($expr->value) . ')', new CompiledType('int', 1, true));
        }
        var_dump($expr);
    }

    public function compileParameters(array $params): array {
        if (empty($params)) {
            return [];
        } elseif ($params[0] instanceof Type\BuiltinType && $params[0]->name === 'void') {
            return [];
        }
        $return = [];
        foreach ($params as $idx => $param) {
            $return[] =  $this->compileType($param);
        }
        return $return;
    }

    private const INT_TYPES = [
        '_Bool',
        'char',
        'short',
        'int',
        'long',
        'long long',
        'long int',
        'long long int',
        'int8_t',
        'uint8_t',
        'int16_t',
        'uint16_t',
        'int32_t',
        'uint32_t',
        'int64_t',
        'uint64_t',
        'unsigned',
        'unsigned char',
        'unsigned short',
        'unsigned int',
        'unsigned long',
        'unsigned long int',
        'unsigned long long',
        'unsigned long long int',
        'size_t',
    ];

    private const FLOAT_TYPES = [
        'float',
        'double',
        'long double',
    ];

    private const NATIVE_TYPES = [
        'int',
        'float',
    ];

    public function compileType(Type $type): CompiledType {
        if ($type instanceof Type\PointerType || $type instanceof Type\ArrayType) {
            $compiled = $this->compileType($type->parent);
            ++$compiled->pointer;
            return $compiled;
        }
        if ($type instanceof Type\TypedefType) {
            $name = $type->name;
restart:
            if (in_array($name, self::INT_TYPES)) {
                return new CompiledType('int', isChar: $name === 'char', rawValue: $type->name);
            }
            if (in_array($name, self::FLOAT_TYPES)) {
                return new CompiledType('float', rawValue: $type->name);
            }
            if (isset($this->resolver[$name])) {
                $name = $this->resolver[$name];
                goto restart;
            }
            return new CompiledType($name);
        } elseif ($type instanceof Type\BuiltinType && $type->name === 'void') {
            return new CompiledType('void');
        } elseif ($type instanceof Type\BuiltinType && in_array($type->name, self::INT_TYPES)) {
            return new CompiledType('int', isChar: $type->name === 'char', rawValue: $type->name);
        } elseif ($type instanceof Type\BuiltinType && in_array($type->name, self::FLOAT_TYPES)) {
            return new CompiledType('float', rawValue: $type->name);
        } elseif ($type instanceof Type\TagType\EnumType) {
            return new CompiledType('int');
        } elseif ($type instanceof Type\AttributedType) {
            // TODO check which kinds need special handling
            return $this->compileType($type->parent);
        } elseif ($type instanceof Type\TagType\RecordType) {
            if ($type->decl->name !== null) {
                return new CompiledType($type->decl->name);
            }
        } elseif ($type instanceof Type\ParenType) {
            return $this->compileType($type->parent);
        } elseif ($type instanceof Type\FunctionType\FunctionProtoType) {
            // TODO preserve fact that it's a function type
            return $this->compileType($type->return);
        }
        var_dump($type);
        throw new \LogicException('Not implemented how to handle type yet: ' . get_class($type));
    }

    public function toPHPType(CompiledType $type): string {
        if ($type->pointer > 0) {
            // special case
            if ($type->isChar) {
                // it's a string
                return 'string' . ($type->pointer === 1 ? '_' : '') . str_repeat('_ptr', $type->pointer - 1);
            }
            return $type->value . str_repeat('_ptr', $type->pointer);
        } else {
            return $type->value;
        }
    }

    public function compileDeclClass(Decl $decl, string $className): array {
        $returns = [];
        if ($decl instanceof Decl\NamedDecl\TypeDecl\TypedefNameDecl\TypedefDecl) {
            if ($decl->type instanceof Type\TagType\EnumType) {
                // don't compile enums
                return [];
            }
            $returns[] = $this->compileDeclClassImpl($decl->name, $decl->name, $className);
            for ($i = 1; $i <= 4; $i++) {
                $returns[] = $this->compileDeclClassImpl($decl->name . str_repeat('_ptr', $i), $decl->name . str_repeat('*', $i), $className);
            }
        }
        return array_merge(...$returns);
    }
    

    protected function compileDeclClassImpl(string $name, string $ptrName, string $className): array {
        if (isset($this->resolver[$name])) {
            return [];
        }
        $return = [];
        $return[] = "class {$name} implements i{$className} {";
        $return[] = '    private FFI\CData $data;';
        if (!isset($this->resolver[$name])) {
            $return[] = '    public function __construct(FFI\CData $data) { $this->data = $data; }';
        } else {
            $return[] = '    public function __construct($data) { $tmp = FFI::new(' . var_export($this->resolver[$name], true) . '); $tmp = $data; $this->data = $tmp; }';
        }
        $return[] = '    public function getData(): FFI\CData { return $this->data; }';
        $return[] = '    public function equals(' . $name . ' $other): bool { return $this->data == $other->data; }';
        $nameWithPtr = $name . '_ptr';
        if ($name === 'string_') {
            $nameWithPtr = 'string_ptr';
        }
        $return[] = '    public function addr(): ' . $nameWithPtr . ' { return new '. $nameWithPtr . '(FFI::addr($this->data)); }';
        if (substr($name, -4) === '_ptr' && $name !== 'void_ptr') {
            $prior = substr($name, 0, -4);
            if ($prior === 'string') {
                $prior = 'string_';
            }
            if (isset($this->resolver[$prior])) {
                if (in_array($this->resolver[$prior], self::INT_TYPES)) {
                    $return[] = '    public function deref(int $n = 0): int { return $this->data[$n] + 0; }';
                } elseif (in_array($this->resolver[$prior], self::FLOAT_TYPES)) {
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
        $return[] = '    public static function getType(): string { return ' . var_export($ptrName, true) . '; }';
        $return[] = '}';
        return $return;
    }

    protected function buildResolver(array $decls): array {
        $toLookup = [];
        $result = [];
        foreach ($decls as $decl) {
            if ($decl instanceof Decl\NamedDecl\TypeDecl\TypedefNameDecl\TypedefDecl) {
                if ($decl->type instanceof Type\TypedefType) {
                    $toLookup[] = [$decl->name, $decl->type->name];
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

    private function recurseAnonymousFieldTypes(string $recordName, Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl $decl, array &$records) {
        foreach ($decl->fields ?? [] as $field) {
            if ($field->type) {
                if ($field->type instanceof Type\TagType\RecordType && $field->type->decl->name === null) {
                    $this->recurseAnonymousFieldTypes($recordName, $field->type->decl, $records);
                } else {
                    $records[$recordName][$field->name] = $this->compileType($field->type);
                }
            }
        }
    }

    protected function buildRecordFieldTypeMap(array $decls): array {
        $records = [];
        foreach ($decls as $decl) {
            if ($decl instanceof Decl\NamedDecl\TypeDecl\TagDecl\RecordDecl) {
                $this->recurseAnonymousFieldTypes($decl->name, $decl, $records);
            }
            if ($decl instanceof Decl\NamedDecl\TypeDecl\TypedefNameDecl\TypedefDecl) {
                if ($decl->type instanceof Type\TagType\RecordType) {
                    $this->recurseAnonymousFieldTypes($decl->name, $decl->type->decl, $records);
                }
            }
        }
        return $records;
    }
}
