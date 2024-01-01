<?php declare(strict_types=1);
namespace FFIMe\Test;
use FFIMe\FFIMe;
use PHPUnit\Framework\TestCase;

/**
 * Note: this is a generated file, do not edit this!!!
 */
class enum_self_referencesTest extends TestCase {

    const EXPECTED = '<?php namespace %s;
use FFI;
use test\\double;
interface itest {}
interface itest_ptr {}
class test {
    const __%s__ = 1;
    const __LP64__ = 1;
    const __GNUC_VA_LIST = 1;
    const __GNUC__ = 4;
    const __GNUC_MINOR__ = 2;
    const __STDC__ = 1;
    const A1 = (1) + 0 /* enum A */;
    const A2 = (self::A1) + 0 /* enum A */;
    const A3 = (2) + 0 /* enum A */;
    const B1 = (1) + 0 /* typedefenum B */;
    const B2 = (self::B1) + 0 /* typedefenum B */;
    const B3 = ((self::B1 | self::B2)) + 0 /* typedefenum B */;
    const B4 = ((self::B1 | self::B2)) + 1 /* typedefenum B */;
    public static function ffi(?string $pathToSoFile = testFFI::SOFILE): testFFI { return new testFFI($pathToSoFile); }
    public static function sizeof($classOrObject): int { return testFFI::sizeof($classOrObject); }
}
class testFFI {
    const SOFILE = \'%s\';
    const TYPES_DEF = \'enum A {
  A1 = 1,
  A2 = A1,
  A3 = 2,
};
typedef enum {
  B1 = 1,
  B2 = B1,
  B3 = (B1 | B2),
  B4,
} B;
\';
    const HEADER_DEF = self::TYPES_DEF . \'\';
    private FFI $ffi;
    private static FFI $staticFFI;
    private static \\WeakMap $__arrayWeakMap;
    private array $__literalStrings = [];
    public function __construct(?string $pathToSoFile = self::SOFILE) {
        $this->ffi = FFI::cdef(self::HEADER_DEF, $pathToSoFile);
    }

    public static function cast(itest $from, string $to): itest {
        if (!is_a($to, itest::class, true)) {
            throw new \\LogicException("Cannot cast to a non-wrapper type");
        }
        return new $to(self::$staticFFI->cast($to::getType(), $from->getData()));
    }

    public static function makeArray(string $class, int|array $elements): itest {
        $type = $class::getType();
        if (substr($type, -1) !== "*") {
            throw new \\LogicException("Attempting to make a non-pointer element into an array");
        }
        if (is_int($elements)) {
            $cdata = self::$staticFFI->new(substr($type, 0, -1) . "[$elements]");
        } else {
            $cdata = self::$staticFFI->new(substr($type, 0, -1) . "[" . count($elements) . "]");
            foreach ($elements as $key => $raw) {
                $cdata[$key] = \\is_scalar($raw) ? \\is_int($raw) && $type === "char*" ? \\chr($raw) : $raw : $raw->getData();
            }
        }
        $object = new $class(self::$staticFFI->cast($type, \\FFI::addr($cdata)));
        self::$__arrayWeakMap[$object] = $cdata;
        return $object;
    }

    public static function sizeof($classOrObject): int {
        if (is_object($classOrObject) && $classOrObject instanceof itest) {
            return FFI::sizeof($classOrObject->getData());
        } elseif (is_a($classOrObject, itest::class, true)) {
            return FFI::sizeof(self::$staticFFI->type($classOrObject::getType()));
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
}

class string_ implements itest, itest_ptr, \\ArrayAccess {
    private FFI\\CData $data;
    public function __construct(FFI\\CData $data) { $this->data = $data; }
    public static function castFrom(itest $data): self { return testFFI::cast($data, self::class); }
    public function getData(): FFI\\CData { return $this->data; }
    public function equals(string_ $other): bool { return $this->data == $other->data; }
    public function addr(): string_ptr { return new string_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int { return \\ord($this->data[$n]); }
    #[\\ReturnTypeWillChange] public function offsetGet($offset): int { return $this->deref($offset); }
    #[\\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \\Error("Cannot unset C structures"); }
    #[\\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = \\chr($value); }
    public static function array(int $size = 1): self { return testFFI::makeArray(self::class, $size); }
    /** @return int[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while ("\\0" !== $cur = $this->data[$i++]) { $ret[] = \\ord($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = \\ord($this->data[$i]); } } return $ret; }
    public function toString(?int $length = null): string { return $length === null ? FFI::string($this->data) : FFI::string($this->data, $length); }
    public static function persistent(string $string): self { $str = new self(FFI::cdef()->new("char[" . \\strlen($string) . "]", false)); FFI::memcpy($str->data, $string, \\strlen($string)); return $str; }
    public static function owned(string $string): self { $str = new self(FFI::cdef()->new("char[" . \\strlen($string) . "]", true)); FFI::memcpy($str->data, $string, \\strlen($string)); return $str; }
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
    public static function size(): int { return testFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class string_ptr implements itest, itest_ptr, \\ArrayAccess {
    private FFI\\CData $data;
    public function __construct(FFI\\CData $data) { $this->data = $data; }
    public static function castFrom(itest $data): self { return testFFI::cast($data, self::class); }
    public function getData(): FFI\\CData { return $this->data; }
    public function equals(string_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): string_ptr_ptr { return new string_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): string_ { return new string_($this->data[$n]); }
    #[\\ReturnTypeWillChange] public function offsetGet($offset): string_ { return $this->deref($offset); }
    #[\\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \\Error("Cannot unset C structures"); }
    #[\\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return testFFI::makeArray(self::class, $size); }
    /** @return string_[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new string_($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new string_($this->data[$i]); } } return $ret; }
    public function set(void_ptr | string_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return \'char**\'; }
    public static function size(): int { return testFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class string_ptr_ptr implements itest, itest_ptr, \\ArrayAccess {%a}
class string_ptr_ptr_ptr implements itest, itest_ptr, \\ArrayAccess {%a}
class void_ptr implements itest, itest_ptr {
    private FFI\\CData $data;
    public function __construct(FFI\\CData $data) { $this->data = $data; }
    public static function castFrom(itest $data): self { return testFFI::cast($data, self::class); }
    public function getData(): FFI\\CData { return $this->data; }
    public function equals(void_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): void_ptr_ptr { return new void_ptr_ptr(FFI::addr($this->data)); }
    public function set(itest_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return \'void*\'; }
    public static function size(): int { return testFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class void_ptr_ptr implements itest, itest_ptr, \\ArrayAccess {%a}
class void_ptr_ptr_ptr implements itest, itest_ptr, \\ArrayAccess {%a}
class void_ptr_ptr_ptr_ptr implements itest, itest_ptr, \\ArrayAccess {%a}
class int_ptr implements itest, itest_ptr, \\ArrayAccess {
    private FFI\\CData $data;
    public function __construct(FFI\\CData $data) { $this->data = $data; }
    public static function castFrom(itest $data): self { return testFFI::cast($data, self::class); }
    public function getData(): FFI\\CData { return $this->data; }
    public function equals(int_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): int_ptr_ptr { return new int_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int { return $this->data[$n]; }
    #[\\ReturnTypeWillChange] public function offsetGet($offset): int { return $this->deref($offset); }
    #[\\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \\Error("Cannot unset C structures"); }
    #[\\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value; }
    public static function array(int $size = 1): self { return testFFI::makeArray(self::class, $size); }
    /** @return int[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = ($this->data[$i]); } return $ret; }
    public function set(int | void_ptr | int_ptr $value): void {
        if (\\is_scalar($value)) {
            $this->data[0] = $value;
        } else {
            FFI::addr($this->data)[0] = $value->getData();
        }
    }
    public static function getType(): string { return \'int*\'; }
    public static function size(): int { return testFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class int_ptr_ptr implements itest, itest_ptr, \\ArrayAccess {%a}
class int_ptr_ptr_ptr implements itest, itest_ptr, \\ArrayAccess {%a}
class int_ptr_ptr_ptr_ptr implements itest, itest_ptr, \\ArrayAccess {%a}
(function() { self::$staticFFI = \\FFI::cdef(testFFI::TYPES_DEF); self::$__arrayWeakMap = new \\WeakMap; })->bindTo(null, testFFI::class)();';

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
        @unlink(__DIR__ . '/enum_self_referencesTest.result.php');
    }

    /**
     * @textdox Test enum self references
     */
    public function testCodeGen() {
        $this->lib->include(__DIR__ . '/enum_self_referencesTest.h');
        $this->lib->codeGen("test\\test", __DIR__ . '/enum_self_referencesTest.result.php');
        $this->assertFileExists(__DIR__ . '/enum_self_referencesTest.result.php');
        $this->assertStringMatchesFormat(self::EXPECTED, trim(file_get_contents(__DIR__ . '/enum_self_referencesTest.result.php')));
    }
}