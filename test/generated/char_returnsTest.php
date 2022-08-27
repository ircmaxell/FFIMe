<?php declare(strict_types=1);
namespace FFIMe\Test;
use FFIMe\FFIMe;
use PHPUnit\Framework\TestCase;

/**
 * Note: this is a generated file, do not edit this!!!
 */
class char_returnsTest extends TestCase {

    const EXPECTED = '<?php namespace %s;
use FFI;
use test\\double;
interface itest {}
interface itest_ptr {}
class test {
    const SOFILE = \'%s\';
    const TYPES_DEF = \'typedef struct LLVMOpaqueModule *LLVMModuleRef;
\';
    const HEADER_DEF = self::TYPES_DEF . \'char *LLVMGetModuleIdentifier(LLVMModuleRef M, size_t *Len);
\';
    private FFI $ffi;
    private static FFI $staticFFI;
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

    public static function cast(itest $from, string $to): itest {
        if (!is_a($to, itest::class)) {
            throw new \\LogicException("Cannot cast to a non-wrapper type");
        }
        return new $to(self::$staticFFI->cast($to::getType(), $from->getData()));
    }

    public static function makeArray(string $class, array $elements): itest {
        $type = $class::getType();
        if (substr($type, -1) !== "*") {
            throw new \\LogicException("Attempting to make a non-pointer element into an array");
        }
        $cdata = self::$staticFFI->new(substr($type, 0, -1) . "[" . count($elements) . "]");
        foreach ($elements as $key => $raw) {
            $cdata[$key] = $raw === null ? null : $raw->getData();
        }
        return new $class($cdata);
    }

    public static function sizeof($classOrObject): int {
        if (is_object($classOrObject) && $classOrObject instanceof itest) {
            return self::$staticFFI->sizeof($classOrObject->getData());
        } elseif (is_a($classOrObject, itest::class)) {
            return self::$staticFFI->sizeof(self::$staticFFI->type($classOrObject::getType()));
        } else {
            throw new \\LogicException("Unknown class/object passed to sizeof()");
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
    public function __allocCachedString(string $str): FFI\\CData {
        return $this->__literalStrings[$str] ??= string_::ownedZero($str)->getData();
    }
    public function LLVMGetModuleIdentifier(void_ptr | struct_LLVMOpaqueModule_ptr | null | array $M, void_ptr | size_t_ptr | null | array $Len): ?string_ {
        $__ffi_internal_refsM = [];
        if (\\is_array($M)) {
            $_ = $this->ffi->new("struct LLVMOpaqueModule[" . \\count($M) . "]");
            $_i = 0;
            foreach ($M as $_k => $_v) {
                if ($_ref = \\ReflectionReference::fromArrayElement($M, $_k)) {
                    $__ffi_internal_refsM[$_i] = &$M[$_k];
                }
                $_[$_i++] = $_v?->getData();
            }
            $__ffi_internal_originalM = $M = $_;
        } else {
            $M = $M?->getData();
        }
        $__ffi_internal_refsLen = [];
        if (\\is_array($Len)) {
            $_ = $this->ffi->new("size_t[" . \\count($Len) . "]");
            $_i = 0;
            foreach ($Len as $_k => $_v) {
                if ($_ref = \\ReflectionReference::fromArrayElement($Len, $_k)) {
                    $__ffi_internal_refsLen[$_i] = &$Len[$_k];
                }
                $_[$_i++] = $_v ?? 0;
            }
            $__ffi_internal_originalLen = $Len = $_;
        } else {
            $Len = $Len?->getData();
        }
        $result = $this->ffi->LLVMGetModuleIdentifier($M, $Len);
        foreach ($__ffi_internal_refsM as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_originalM[$_k];
        }
        foreach ($__ffi_internal_refsLen as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_originalLen[$_k];
        }
        return $result === null ? null : new string_($result);
    }
}
(function() { self::$staticFFI = \\FFI::cdef(test::TYPES_DEF); })->bindTo(null, test::class)();

class string_ implements itest, itest_ptr, \\ArrayAccess {
    private FFI\\CData $data;
    public function __construct(FFI\\CData $data) { $this->data = $data; }
    public static function castFrom(itest $data): self { return test::cast($data, self::class); }
    public function getData(): FFI\\CData { return $this->data; }
    public function equals(string_ $other): bool { return $this->data == $other->data; }
    public function addr(): string_ptr { return new string_ptr(FFI::addr($this->data)); }
    #[\\ReturnTypeWillChange] public function offsetGet($offset): int { return $this->deref($offset); }
    #[\\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \\Error("Cannot unset C structures"); }
    #[\\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = \\chr($value); }
    public function deref(int $n = 0): int { return \\ord($this->data[$n]); }
    public static function array(int $size = 1): self { return test::makeArray(self::class, $size); }
    /** @return int[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while ("\\0" !== $cur = $this->data[$i++]) { $ret[] = \\ord($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = \\ord($this->data[$i]); } } return $ret; }
    public function toString(?int $length = null): string { return $length === null ? FFI::string($this->data) : FFI::string($this->data, $length); }
    public static function persistent(string $string): self { $str = new self(FFI::new("char[" . \\strlen($string) . "]", false)); FFI::memcpy($str->data, $string, \\strlen($string)); return $str; }
    public static function owned(string $string): self { $str = new self(FFI::new("char[" . \\strlen($string) . "]", true)); FFI::memcpy($str->data, $string, \\strlen($string)); return $str; }
    public static function persistentZero(string $string): self { return self::persistent("$string\\0"); }
    public static function ownedZero(string $string): self { return self::owned("$string\\0"); }
    public function set(int | void_ptr | string_ $value): void {
        if (\\is_scalar($value)) {
            $this->data[0] = \\chr($value);
        } else {
            FFI::addr($this->data)[0] = $value->getData();
        }
    }
    public static function getType(): string { return \'char*\'; }
    public static function size(): int { return test::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class string_ptr implements itest, itest_ptr, \\ArrayAccess {
    private FFI\\CData $data;
    public function __construct(FFI\\CData $data) { $this->data = $data; }
    public static function castFrom(itest $data): self { return test::cast($data, self::class); }
    public function getData(): FFI\\CData { return $this->data; }
    public function equals(string_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): string_ptr_ptr { return new string_ptr_ptr(FFI::addr($this->data)); }
    #[\\ReturnTypeWillChange] public function offsetGet($offset): string_ { return $this->deref($offset); }
    #[\\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \\Error("Cannot unset C structures"); }
    #[\\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public function deref(int $n = 0): string_ { return new string_($this->data[$n]); }
    public static function array(int $size = 1): self { return test::makeArray(self::class, $size); }
    /** @return string_[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new string_($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new string_($this->data[$i]); } } return $ret; }
    public function set(void_ptr | string_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return \'char**\'; }
    public static function size(): int { return test::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class string_ptr_ptr implements itest, itest_ptr, \\ArrayAccess {%a}
class string_ptr_ptr_ptr implements itest, itest_ptr, \\ArrayAccess {%a}
class void_ptr implements itest, itest_ptr {
    private FFI\\CData $data;
    public function __construct(FFI\\CData $data) { $this->data = $data; }
    public static function castFrom(itest $data): self { return test::cast($data, self::class); }
    public function getData(): FFI\\CData { return $this->data; }
    public function equals(void_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): void_ptr_ptr { return new void_ptr_ptr(FFI::addr($this->data)); }
    public function set(itest_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return \'void*\'; }
    public static function size(): int { return test::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class void_ptr_ptr implements itest, itest_ptr, \\ArrayAccess {%a}
class void_ptr_ptr_ptr implements itest, itest_ptr, \\ArrayAccess {%a}
class void_ptr_ptr_ptr_ptr implements itest, itest_ptr, \\ArrayAccess {%a}
class size_t_ptr implements itest, itest_ptr, \\ArrayAccess {
    private FFI\\CData $data;
    public function __construct(FFI\\CData $data) { $this->data = $data; }
    public static function castFrom(itest $data): self { return test::cast($data, self::class); }
    public function getData(): FFI\\CData { return $this->data; }
    public function equals(size_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): size_t_ptr_ptr { return new size_t_ptr_ptr(FFI::addr($this->data)); }
    #[\\ReturnTypeWillChange] public function offsetGet($offset): size_t { return $this->deref($offset); }
    #[\\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \\Error("Cannot unset C structures"); }
    #[\\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value; }
    public function deref(int $n = 0): int { return $this->data[$n]; }
    public static function array(int $size = 1): self { return test::makeArray(self::class, $size); }
    /** @return int[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = ($this->data[$i]); } return $ret; }
    public function set(int | void_ptr | size_t_ptr $value): void {
        if (\\is_scalar($value)) {
            $this->data[0] = $value;
        } else {
            FFI::addr($this->data)[0] = $value->getData();
        }
    }
    public static function getType(): string { return \'size_t*\'; }
    public static function size(): int { return test::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class size_t_ptr_ptr implements itest, itest_ptr, \\ArrayAccess {%a}
class size_t_ptr_ptr_ptr implements itest, itest_ptr, \\ArrayAccess {%a}
class size_t_ptr_ptr_ptr_ptr implements itest, itest_ptr, \\ArrayAccess {%a}
\\class_alias(__NAMESPACE__ . "\\\\struct_LLVMOpaqueModule_ptr", __NAMESPACE__ . "\\\\LLVMModuleRef");
\\class_alias(__NAMESPACE__ . "\\\\struct_LLVMOpaqueModule_ptr_ptr", __NAMESPACE__ . "\\\\LLVMModuleRef_ptr");
\\class_alias(__NAMESPACE__ . "\\\\struct_LLVMOpaqueModule_ptr_ptr_ptr", __NAMESPACE__ . "\\\\LLVMModuleRef_ptr_ptr");
\\class_alias(__NAMESPACE__ . "\\\\struct_LLVMOpaqueModule_ptr_ptr_ptr_ptr", __NAMESPACE__ . "\\\\LLVMModuleRef_ptr_ptr_ptr");';

    protected FFIMe $lib;
    protected Printer $printer;

    public function setUp(): void {
        $this->lib = new class(
            PHP_OS_FAMILY === "Darwin" ? "/usr/lib/libSystem.B.dylib" : "/lib/x86_64-linux-gnu/libc.so.6",
            [
                __DIR__,
                __DIR__ . '/../include'
            ]
        ) extends FFIMe {
            // Bypass filtering for tests
            protected function filterSymbolDeclarations(): void {}
        };
    }

    public function tearDown(): void {
        @unlink(__DIR__ . '/char_returnsTest.result.php');
    }

    /**
     * @textdox Test basic parsing of character returns
     */
    public function testCodeGen() {
        $this->lib->include(__DIR__ . '/char_returnsTest.h');
        $this->lib->codeGen("test\\test", __DIR__ . '/char_returnsTest.result.php');
        $this->assertFileExists(__DIR__ . '/char_returnsTest.result.php');
        $this->assertStringMatchesFormat(self::EXPECTED, trim(file_get_contents(__DIR__ . '/char_returnsTest.result.php')));
    }
}