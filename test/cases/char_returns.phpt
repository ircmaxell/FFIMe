--TEST--
Test basic parsing of character returns
--FILE--
typedef struct LLVMOpaqueModule *LLVMModuleRef;
const char *LLVMGetModuleIdentifier(LLVMModuleRef M, size_t *Len);
--EXPECTF--
<?php namespace %s;
use FFI;
interface itest {}
class test {
    const SOFILE = '%s';
    const HEADER_DEF = 'typedef struct LLVMOpaqueModule *LLVMModuleRef;
char *LLVMGetModuleIdentifier(LLVMModuleRef M, size_t *Len);
';
    private FFI $ffi;
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
    public function LLVMGetModuleIdentifier(?LLVMModuleRef $p0, ?int_ptr $p1): ?string_ {
        $result = $this->ffi->LLVMGetModuleIdentifier($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new string_($result);
    }
}

class string_ implements itest {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(string_ $other): bool { return $this->data == $other->data; }
    public function addr(): string_ptr { return new string_ptr(FFI::addr($this->data)); }
    public function toString(?int $length = null): string { return $length === null ? FFI::string($this->data) : FFI::string($this->data, $length); }
    public static function getType(): string { return 'char*'; }
}
class string_ptr implements itest {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(string_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): string_ptr_ptr { return new string_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): string_ { return new string_($this->data[$n]); }
    public static function getType(): string { return 'char**'; }
}
class string_ptr_ptr implements itest {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(string_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): string_ptr_ptr_ptr { return new string_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): string_ptr { return new string_ptr($this->data[$n]); }
    public static function getType(): string { return 'char***'; }
}
class string_ptr_ptr_ptr implements itest {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(string_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): string_ptr_ptr_ptr_ptr { return new string_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): string_ptr_ptr { return new string_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'char****'; }
}
class int_ptr implements itest {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(int_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): int_ptr_ptr { return new int_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int { return new int($this->data[$n]); }
    public static function getType(): string { return 'int*'; }
}
class int_ptr_ptr implements itest {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(int_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): int_ptr_ptr_ptr { return new int_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int_ptr { return new int_ptr($this->data[$n]); }
    public static function getType(): string { return 'int**'; }
}
class int_ptr_ptr_ptr implements itest {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(int_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): int_ptr_ptr_ptr_ptr { return new int_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int_ptr_ptr { return new int_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'int***'; }
}
class void_ptr implements itest {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(void_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): void_ptr_ptr { return new void_ptr_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'void*'; }
}
class void_ptr_ptr implements itest {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(void_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): void_ptr_ptr_ptr { return new void_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): void_ptr { return new void_ptr($this->data[$n]); }
    public static function getType(): string { return 'void**'; }
}
class void_ptr_ptr_ptr implements itest {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(void_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): void_ptr_ptr_ptr_ptr { return new void_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): void_ptr_ptr { return new void_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'void***'; }
}
class LLVMModuleRef implements itest {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(LLVMModuleRef $other): bool { return $this->data == $other->data; }
    public function addr(): LLVMModuleRef_ptr { return new LLVMModuleRef_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'LLVMModuleRef'; }
}
class LLVMModuleRef_ptr implements itest {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(LLVMModuleRef_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): LLVMModuleRef_ptr_ptr { return new LLVMModuleRef_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): LLVMModuleRef { return new LLVMModuleRef($this->data[$n]); }
    public static function getType(): string { return 'LLVMModuleRef*'; }
}
class LLVMModuleRef_ptr_ptr implements itest {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(LLVMModuleRef_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): LLVMModuleRef_ptr_ptr_ptr { return new LLVMModuleRef_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): LLVMModuleRef_ptr { return new LLVMModuleRef_ptr($this->data[$n]); }
    public static function getType(): string { return 'LLVMModuleRef**'; }
}
class LLVMModuleRef_ptr_ptr_ptr implements itest {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(LLVMModuleRef_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): LLVMModuleRef_ptr_ptr_ptr_ptr { return new LLVMModuleRef_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): LLVMModuleRef_ptr_ptr { return new LLVMModuleRef_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'LLVMModuleRef***'; }
}
class LLVMModuleRef_ptr_ptr_ptr_ptr implements itest {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(LLVMModuleRef_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): LLVMModuleRef_ptr_ptr_ptr_ptr_ptr { return new LLVMModuleRef_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): LLVMModuleRef_ptr_ptr_ptr { return new LLVMModuleRef_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'LLVMModuleRef****'; }
}
