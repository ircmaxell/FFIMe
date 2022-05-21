--TEST--
Test basic parsing of character returns
--FILE--
typedef struct LLVMOpaqueModule *LLVMModuleRef;
const char *LLVMGetModuleIdentifier(LLVMModuleRef M, size_t *Len);
--EXPECTF--
<?php namespace %s;
use FFI;
use test\double;
interface itest {}
interface itest_ptr {}
class test {
    const SOFILE = '%s';
    const HEADER_DEF = 'typedef struct LLVMOpaqueModule *LLVMModuleRef;
char *LLVMGetModuleIdentifier(LLVMModuleRef M, size_t *Len);
';
    private FFI $ffi;
    private array $__literalStrings = [];
    const __%s__ = 1;
    const __LP64__ = 1;
    const __GNUC_VA_LIST = 1;
    const __GNUC__ = 4;
    const __GNUC_MINOR__ = 2;
    const __STDC__ = 1;
    public function __construct(string $pathToSoFile = self::SOFILE) {
        $this->ffi = FFI::cdef(self::HEADER_DEF, $pathToSoFile);
    }

    public function cast(itest $from, string $to): itest {
        if (!is_a($to, itest::class)) {
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
        if (is_object($classOrObject) && $classOrObject instanceof itest) {
            return $this->ffi->sizeof($classOrObject->getData());
        } elseif (is_a($classOrObject, itest::class)) {
            return $this->ffi->sizeof($this->ffi->type($classOrObject::getType()));
        } else {
            throw new \LogicException("Unknown class/object passed to sizeof()");
        }
    }

    public function getFFI(): FFI {
        return $this->ffi;
    }


    public function __get(string $name) {
        switch($name) {
            default: return $this->ffi->$name;
        }
    }
    public function __set(string $name, $value) {
        switch($name) {
            default: return $this->ffi->$name;
        }
    }
    public function __allocCachedString(string $str): FFI\CData {
        return $this->__literalStrings[$str] ??= string_::ownedZero($str)->getData();
    }
    public function LLVMGetModuleIdentifier(void_ptr | struct_LLVMOpaqueModule_ptr | null | array $M, void_ptr | size_t_ptr | null | array $Len): ?string_ {
        if (\is_array($M)) {
            $_ = $this->ffi->new("struct LLVMOpaqueModule[" . \count($M) . "]");
            foreach (\array_values($M) as $_k => $_v) {
                $_[$_k] = $_v->getData();
            }
            $M = $_;
        } else {
            $M = $M->getData();
        }
        if (\is_array($Len)) {
            $_ = $this->ffi->new("size_t[" . \count($Len) . "]");
            foreach (\array_values($Len) as $_k => $_v) {
                $_[$_k] = $_v;
            }
            $Len = $_;
        } else {
            $Len = $Len->getData();
        }
        $result = $this->ffi->LLVMGetModuleIdentifier($M, $Len);
        return $result === null ? null : new string_($result);
    }
}

class string_ implements itest, itest_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(string_ $other): bool { return $this->data == $other->data; }
    public function addr(): string_ptr { return new string_ptr(FFI::addr($this->data)); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): str { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = \chr($value); }
    public function deref(int $n = 0): int { return \ord($this->data[$n]); }
    public function toString(?int $length = null): string { return $length === null ? FFI::string($this->data) : FFI::string($this->data, $length); }
    public static function persistent(string $string): self { $str = new self(FFI::new("char[" . \strlen($string) . "]", false)); FFI::memcpy($str->data, $string, \strlen($string)); return $str; }
    public static function owned(string $string): self { $str = new self(FFI::new("char[" . \strlen($string) . "]", true)); FFI::memcpy($str->data, $string, \strlen($string)); return $str; }
    public static function persistentZero(string $string): self { return self::persistent("$string\0"); }
    public static function ownedZero(string $string): self { return self::owned("$string\0"); }
    public function set(int | void_ptr | string_ $value): void {
        if (\is_scalar($value)) {
            $this->data[0] = \chr($value);
        } else {
            FFI::addr($this->data)[0] = $value->getData();
        }
    }
    public static function getType(): string { return 'char*'; }
    public function getDefinition(): string { return static::getType(); }
}
class string_ptr implements itest, itest_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(string_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): string_ptr_ptr { return new string_ptr_ptr(FFI::addr($this->data)); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): string { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public function deref(int $n = 0): string_ { return new string_($this->data[$n]); }
    public function set(void_ptr | string_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'char**'; }
    public function getDefinition(): string { return static::getType(); }
}
class string_ptr_ptr implements itest, itest_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(string_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): string_ptr_ptr_ptr { return new string_ptr_ptr_ptr(FFI::addr($this->data)); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): string_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public function deref(int $n = 0): string_ptr { return new string_ptr($this->data[$n]); }
    public function set(void_ptr | string_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'char***'; }
    public function getDefinition(): string { return static::getType(); }
}
class string_ptr_ptr_ptr implements itest, itest_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(string_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): string_ptr_ptr_ptr_ptr { return new string_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): string_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public function deref(int $n = 0): string_ptr_ptr { return new string_ptr_ptr($this->data[$n]); }
    public function set(void_ptr | string_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'char***'; }
    public function getDefinition(): string { return static::getType(); }
}
class void_ptr implements itest, itest_ptr {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(void_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): void_ptr_ptr { return new void_ptr_ptr(FFI::addr($this->data)); }
    public function set(itest_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'void*'; }
    public function getDefinition(): string { return static::getType(); }
}
class void_ptr_ptr implements itest, itest_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(void_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): void_ptr_ptr_ptr { return new void_ptr_ptr_ptr(FFI::addr($this->data)); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): void_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public function deref(int $n = 0): void_ptr { return new void_ptr($this->data[$n]); }
    public function set(void_ptr | void_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'void**'; }
    public function getDefinition(): string { return static::getType(); }
}
class void_ptr_ptr_ptr implements itest, itest_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(void_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): void_ptr_ptr_ptr_ptr { return new void_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): void_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public function deref(int $n = 0): void_ptr_ptr { return new void_ptr_ptr($this->data[$n]); }
    public function set(void_ptr | void_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'void***'; }
    public function getDefinition(): string { return static::getType(); }
}
class void_ptr_ptr_ptr_ptr implements itest, itest_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(void_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): void_ptr_ptr_ptr_ptr_ptr { return new void_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): void_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public function deref(int $n = 0): void_ptr_ptr_ptr { return new void_ptr_ptr_ptr($this->data[$n]); }
    public function set(void_ptr | void_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'void****'; }
    public function getDefinition(): string { return static::getType(); }
}
class size_t_ptr implements itest, itest_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(size_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): size_t_ptr_ptr { return new size_t_ptr_ptr(FFI::addr($this->data)); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): size_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value; }
    public function deref(int $n = 0): int { return $this->data[$n]; }
    public function set(int | void_ptr | size_t_ptr $value): void {
        if (\is_scalar($value)) {
            $this->data[0] = $value;
        } else {
            FFI::addr($this->data)[0] = $value->getData();
        }
    }
    public static function getType(): string { return 'size_t*'; }
    public function getDefinition(): string { return static::getType(); }
}
class size_t_ptr_ptr implements itest, itest_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(size_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): size_t_ptr_ptr_ptr { return new size_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): size_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public function deref(int $n = 0): size_t_ptr { return new size_t_ptr($this->data[$n]); }
    public function set(void_ptr | size_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'size_t**'; }
    public function getDefinition(): string { return static::getType(); }
}
class size_t_ptr_ptr_ptr implements itest, itest_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(size_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): size_t_ptr_ptr_ptr_ptr { return new size_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): size_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public function deref(int $n = 0): size_t_ptr_ptr { return new size_t_ptr_ptr($this->data[$n]); }
    public function set(void_ptr | size_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'size_t***'; }
    public function getDefinition(): string { return static::getType(); }
}
class size_t_ptr_ptr_ptr_ptr implements itest, itest_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(size_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): size_t_ptr_ptr_ptr_ptr_ptr { return new size_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): size_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public function deref(int $n = 0): size_t_ptr_ptr_ptr { return new size_t_ptr_ptr_ptr($this->data[$n]); }
    public function set(void_ptr | size_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'size_t****'; }
    public function getDefinition(): string { return static::getType(); }
}
\class_alias(__NAMESPACE__ . "\\struct_LLVMOpaqueModule_ptr", __NAMESPACE__ . "\\LLVMModuleRef");
\class_alias(__NAMESPACE__ . "\\struct_LLVMOpaqueModule_ptr_ptr", __NAMESPACE__ . "\\LLVMModuleRef_ptr");
\class_alias(__NAMESPACE__ . "\\struct_LLVMOpaqueModule_ptr_ptr_ptr", __NAMESPACE__ . "\\LLVMModuleRef_ptr_ptr");
\class_alias(__NAMESPACE__ . "\\struct_LLVMOpaqueModule_ptr_ptr_ptr_ptr", __NAMESPACE__ . "\\LLVMModuleRef_ptr_ptr_ptr");