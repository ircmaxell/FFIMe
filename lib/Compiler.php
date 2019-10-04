<?php

declare(strict_types=1);

namespace FFIMe;
use PHPCParser\CParser;
use PHPCParser\Node\Decl;
use PHPCParser\Node\TranslationUnitDecl;
use PHPCParser\Node\Type;
use PHPCParser\Printer;
use PHPCParser\Node\Stmt\ValueStmt\Expr;

class Compiler {

    private array $defines;
    private array $resolver; 

    public function compile(string $soFile, array $decls, array $defines, string $className): string {
        $this->defines = $defines;
        $this->resolver = $this->buildResolver($decls);
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
        foreach ($decls as $decl) {
            $class = array_merge($class, $this->compileDecl($decl));
        }
        $class[] = "}\n";
        $class = array_merge($class, $this->compileDeclClassImpl('string_', 'char*', $className));
        $class = array_merge($class, $this->compileDeclClassImpl('string_ptr', 'char**', $className));
        $class = array_merge($class, $this->compileDeclClassImpl('string_ptr_ptr', 'char***', $className));
        $class = array_merge($class, $this->compileDeclClassImpl('string_ptr_ptr_ptr', 'char****', $className));
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
                $return = $this->compileType($decl->type);
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

    public function compileDecl(Decl $declaration): array {
        $return = [];
        if ($declaration instanceof Decl\NamedDecl\ValueDecl\DeclaratorDecl\FunctionDecl) {
            $returnType = $this->compileType($declaration->type->return);
            $params = $this->compileParameters($declaration->type->params);
            $nullableReturnType = $returnType === 'void' ? 'void' : '?' . $returnType;
            if ($returnType === 'string') {
                $nullableReturnType .= '_';
            }
            $paramSignature = [];
            foreach ($params as $idx => $param) {
                $paramSignature[] = '?' . $param . ' $p' . $idx;
            }
            $return[] = "    public function {$declaration->name}(" . implode(', ', $paramSignature) . "): " . $nullableReturnType . " {";
            
            $callParams = [];
            foreach ($params as $idx => $param) {
                if (in_array($param, self::NATIVE_TYPES)) {
                    $callParams[] = '$p' . $idx;
                } else {
                    $callParams[] = '$p' . $idx . ' === null ? null : $p' . $idx . '->getData()';
                }
            }
            if ($returnType !== 'void') {
                $return[] = '        $result = $this->ffi->' . $declaration->name . '(' . implode(', ', $callParams) . ');';
                if ($returnType === 'string') {
                    $return[] = '        return $result === null ? null : new string_($result);';
                } elseif (in_array($returnType, self::NATIVE_TYPES)) {
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
                    if ($field->value !== null) {
                        $lastValue =  $this->compileExpr($field->value);
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
        }
        return $return;
    }

    public function compileExpr(Expr $expr): string {
        if ($expr instanceof Expr\IntegerLiteral) {
            // parse out type qualifiers
            $value = str_replace(['u', 'U', 'l', 'L'], '', $expr->value);
            return (string) intval($expr->value);
        }
        if ($expr instanceof Expr\AbstractConditionalOperator\ConditionalOperator) {
            return '(' . $this->compileExpr($expr->cond) . ' ? ' . $this->compileExpr($expr->ifTrue) . ' : ' . $this->compileExpr($expr->ifFalse) . ')';
        }
        if ($expr instanceof Expr\UnaryOperator) {
            switch ($expr->kind) {
                case Expr\UnaryOperator::KIND_PLUS:
                    return '(+' . $this->compileExpr($expr->expr) . ')';
                case Expr\UnaryOperator::KIND_MINUS:
                    return '(-' . $this->compileExpr($expr->expr) . ')';
                case Expr\UnaryOperator::KIND_BITWISE_NOT:
                    return '(~' . $this->compileExpr($expr->expr) . ')';
                case Expr\UnaryOperator::KIND_LOGICAL_NOT:
                    return '(!' . $this->compileExpr($expr->expr) . ')';
                default:
                    throw new \LogicException("Unsupported unary operator for library: " . $expr->kind);
            }
        }
        if ($expr instanceof Expr\BinaryOperator) {
            switch ($expr->kind) {
                case Expr\BinaryOperator::KIND_ADD:
                    return '(' . $this->compileExpr($expr->left) . ' + ' . $this->compileExpr($expr->right) . ')';
                case Expr\BinaryOperator::KIND_SUB:
                    return '(' . $this->compileExpr($expr->left) . ' - ' . $this->compileExpr($expr->right) . ')';
                case Expr\BinaryOperator::KIND_MUL:
                    return '(' . $this->compileExpr($expr->left) . ' * ' . $this->compileExpr($expr->right) . ')';
                case Expr\BinaryOperator::KIND_DIV:
                    return '(' . $this->compileExpr($expr->left) . ' / ' . $this->compileExpr($expr->right) . ')';
                case Expr\BinaryOperator::KIND_REM:
                    return '(' . $this->compileExpr($expr->left) . ' % ' . $this->compileExpr($expr->right) . ')';
                case Expr\BinaryOperator::KIND_SHL:
                    return '(' . $this->compileExpr($expr->left) . ' << ' . $this->compileExpr($expr->right) . ')';
                case Expr\BinaryOperator::KIND_SHR:
                    return '(' . $this->compileExpr($expr->left) . ' >> ' . $this->compileExpr($expr->right) . ')';
                case Expr\BinaryOperator::KIND_LT:
                    return '(' . $this->compileExpr($expr->left) . ' < ' . $this->compileExpr($expr->right) . ')';
                case Expr\BinaryOperator::KIND_GT:
                    return '(' . $this->compileExpr($expr->left) . ' > ' . $this->compileExpr($expr->right) . ')';
                case Expr\BinaryOperator::KIND_LE:
                    return '(' . $this->compileExpr($expr->left) . ' <= ' . $this->compileExpr($expr->right) . ')';
                case Expr\BinaryOperator::KIND_GE:
                    return '(' . $this->compileExpr($expr->left) . ' >= ' . $this->compileExpr($expr->right) . ')';
                case Expr\BinaryOperator::KIND_EQ:
                    return '(' . $this->compileExpr($expr->left) . ' === ' . $this->compileExpr($expr->right) . ')';
                case Expr\BinaryOperator::KIND_NE:
                    return '(' . $this->compileExpr($expr->left) . ' !== ' . $this->compileExpr($expr->right) . ')';
                case Expr\BinaryOperator::KIND_BITWISE_AND:
                    return '(' . $this->compileExpr($expr->left) . ' & ' . $this->compileExpr($expr->right) . ')';
                case Expr\BinaryOperator::KIND_BITWISE_OR:
                    return '(' . $this->compileExpr($expr->left) . ' | ' . $this->compileExpr($expr->right) . ')';
                case Expr\BinaryOperator::KIND_BITWISE_XOR:
                    return '(' . $this->compileExpr($expr->left) . ' ^ ' . $this->compileExpr($expr->right) . ')';
                case Expr\BinaryOperator::KIND_LOGICAL_AND:
                    return '(' . $this->compileExpr($expr->left) . ' && ' . $this->compileExpr($expr->right) . ')';
                case Expr\BinaryOperator::KIND_LOGICAL_OR:
                    return '(' . $this->compileExpr($expr->left) . ' || ' . $this->compileExpr($expr->right) . ')';
                case Expr\BinaryOperator::KIND_COMMA:
                    return $this->compileExpr($expr->left) . ', ' . $this->compileExpr($expr->right);
            }
        }
        if ($expr instanceof Expr\DeclRefExpr) {
            return 'self::' . $expr->name;
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
        'bool',
        'char',
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
        'bool',
        'string',
        'array',
        'callback',
    ];

    public function compileType(Type $type): string {
        if ($type instanceof Type\TypedefType) {
            $name = $type->name;
restart:
            if (in_array($name, self::INT_TYPES)) {
                return 'int';
            }
            if (in_array($name, self::FLOAT_TYPES)) {
                return 'float';
            }
            if (isset($this->resolver[$name])) {
                $name = $this->resolver[$name];
                goto restart;
            }
            return $name;
        } elseif ($type instanceof Type\BuiltinType && $type->name === 'void') {
            return 'void';
        } elseif ($type instanceof Type\BuiltinType && in_array($type->name, self::INT_TYPES)) {
            return 'int';
        } elseif ($type instanceof Type\BuiltinType && in_array($type->name, self::FLOAT_TYPES)) {
            return 'float';
        } elseif ($type instanceof Type\TagType\EnumType) {
            return 'int';
        } elseif ($type instanceof Type\PointerType) {
            // special case
            if ($type->parent instanceof Type\BuiltinType && $type->parent->name === 'char') {
                // it's a string
                return 'string';
            } elseif ($type->parent instanceof Type\AttributedType && $type->parent->parent instanceof Type\BuiltinType && $type->parent->parent->name === 'char') {
                // const char*
                return 'string';
            } elseif ($type->parent instanceof Type\ParenType && $type->parent->parent instanceof Type\FunctionType) {
                return 'callback';
            }
            return $this->compileType($type->parent) . '_ptr';
        } elseif ($type instanceof Type\AttributedType) {
            if ($type->kind === Type\AttributedType::KIND_CONST) {
                // we can omit const from our compilation
                return $this->compileType($type->parent);
            } elseif ($type->kind === Type\AttributedType::KIND_EXTERN) {
                return $this->compileType($type->parent);
            }
        } elseif ($type instanceof Type\TagType\RecordType) {
            if ($type->decl->name !== null) {
                return $type->decl->name;
            }
        } elseif ($type instanceof Type\ArrayType\ConstantArrayType) {
            return 'array';
        } elseif ($type instanceof Type\ArrayType\IncompleteArrayType) {
            return 'array';
        }
        var_dump($type);
        throw new \LogicException('Not implemented how to handle type yet: ' . get_class($type));
    }

    public function compileDeclClass(Decl $decl, string $className): array {
        $return = [];
        if ($decl instanceof Decl\NamedDecl\TypeDecl\TypedefNameDecl\TypedefDecl) {
            if ($decl->type instanceof Type\TagType\EnumType) {
                // don't compile enums
                return [];
            }
            $return = array_merge($return, $this->compileDeclClassImpl($decl->name, $decl->name, $className));
            for ($i = 1; $i <= 4; $i++) {
                $return = array_merge($return, $this->compileDeclClassImpl($decl->name . str_repeat('_ptr', $i), $decl->name . str_repeat('*', $i), $className));
            }
        }
        return $return;
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

}