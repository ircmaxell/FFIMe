<?php declare(strict_types=1);
namespace FFIMe\Test;
use FFIMe\FFIMe;
use PHPUnit\Framework\TestCase;

/**
 * Note: this is a generated file, do not edit this!!!
 */
class basic_typedefsTest extends TestCase {

    const EXPECTED = '<?php namespace %s;
use FFI;
interface itest {}
class test {
    const SOFILE = \'%s\';
    const HEADER_DEF = \'typedef long int intmax_t;
typedef unsigned long int uintmax_t;
intmax_t foo(intmax_t a);
extern uintmax_t blah();
\';
    private FFI $ffi;
    public function __construct(string $pathToSoFile = self::SOFILE) {
        $this->ffi = FFI::cdef(self::HEADER_DEF, $pathToSoFile);
    }
    
    public function cast(itest $from, string $to): itest {
        if (!is_a($to, itest::class)) {
            throw new \\LogicException("Cannot cast to a non-wrapper type");
        }
        return new $to($this->ffi->cast($to::getType(), $from->getData()));
    }

    public function makeArray(string $class, array $elements) {
        $type = $class::getType();
        if (substr($type, -1) !== "*") {
            throw new \\LogicException("Attempting to make a non-pointer element into an array");
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
    public function foo(?int $p0): ?int {
        $result = $this->ffi->foo($p0);
        return $result;
    }
    public function blah(): ?int {
        $result = $this->ffi->blah();
        return $result;
    }
}

class string_ implements itest {
    private FFI\\CData $data;
    public function __construct(FFI\\CData $data) { $this->data = $data; }
    public function getData(): FFI\\CData { return $this->data; }
    public function equals(string_ $other): bool { return $this->data == $other->data; }
    public function addr(): string_ptr { return new string_ptr(FFI::addr($this->data)); }
    public function toString(?int $length = null): string { return $length === null ? FFI::string($this->data) : FFI::string($this->data, $length); }
    public static function getType(): string { return \'char*\'; }
}
class string_ptr implements itest {
    private FFI\\CData $data;
    public function __construct(FFI\\CData $data) { $this->data = $data; }
    public function getData(): FFI\\CData { return $this->data; }
    public function equals(string_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): string_ptr_ptr { return new string_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): string_ { return new string_($this->data[$n]); }
    public static function getType(): string { return \'char**\'; }
}
class string_ptr_ptr implements itest {
    private FFI\\CData $data;
    public function __construct(FFI\\CData $data) { $this->data = $data; }
    public function getData(): FFI\\CData { return $this->data; }
    public function equals(string_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): string_ptr_ptr_ptr { return new string_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): string_ptr { return new string_ptr($this->data[$n]); }
    public static function getType(): string { return \'char***\'; }
}
class string_ptr_ptr_ptr implements itest {
    private FFI\\CData $data;
    public function __construct(FFI\\CData $data) { $this->data = $data; }
    public function getData(): FFI\\CData { return $this->data; }
    public function equals(string_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): string_ptr_ptr_ptr_ptr { return new string_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): string_ptr_ptr { return new string_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return \'char****\'; }
}
class void_ptr implements itest {
    private FFI\\CData $data;
    public function __construct(FFI\\CData $data) { $this->data = $data; }
    public function getData(): FFI\\CData { return $this->data; }
    public function equals(void_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): void_ptr_ptr { return new void_ptr_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return \'void*\'; }
}
class void_ptr_ptr implements itest {
    private FFI\\CData $data;
    public function __construct(FFI\\CData $data) { $this->data = $data; }
    public function getData(): FFI\\CData { return $this->data; }
    public function equals(void_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): void_ptr_ptr_ptr { return new void_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): void_ptr { return new void_ptr($this->data[$n]); }
    public static function getType(): string { return \'void**\'; }
}
class void_ptr_ptr_ptr implements itest {
    private FFI\\CData $data;
    public function __construct(FFI\\CData $data) { $this->data = $data; }
    public function getData(): FFI\\CData { return $this->data; }
    public function equals(void_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): void_ptr_ptr_ptr_ptr { return new void_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): void_ptr_ptr { return new void_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return \'void***\'; }
}
class intmax_t_ptr implements itest {
    private FFI\\CData $data;
    public function __construct(FFI\\CData $data) { $this->data = $data; }
    public function getData(): FFI\\CData { return $this->data; }
    public function equals(intmax_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): intmax_t_ptr_ptr { return new intmax_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int { return $this->data[$n] + 0; }
    public static function getType(): string { return \'intmax_t*\'; }
}
class intmax_t_ptr_ptr implements itest {
    private FFI\\CData $data;
    public function __construct(FFI\\CData $data) { $this->data = $data; }
    public function getData(): FFI\\CData { return $this->data; }
    public function equals(intmax_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): intmax_t_ptr_ptr_ptr { return new intmax_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): intmax_t_ptr { return new intmax_t_ptr($this->data[$n]); }
    public static function getType(): string { return \'intmax_t**\'; }
}
class intmax_t_ptr_ptr_ptr implements itest {
    private FFI\\CData $data;
    public function __construct(FFI\\CData $data) { $this->data = $data; }
    public function getData(): FFI\\CData { return $this->data; }
    public function equals(intmax_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): intmax_t_ptr_ptr_ptr_ptr { return new intmax_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): intmax_t_ptr_ptr { return new intmax_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return \'intmax_t***\'; }
}
class intmax_t_ptr_ptr_ptr_ptr implements itest {
    private FFI\\CData $data;
    public function __construct(FFI\\CData $data) { $this->data = $data; }
    public function getData(): FFI\\CData { return $this->data; }
    public function equals(intmax_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): intmax_t_ptr_ptr_ptr_ptr_ptr { return new intmax_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): intmax_t_ptr_ptr_ptr { return new intmax_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return \'intmax_t****\'; }
}
class uintmax_t_ptr implements itest {
    private FFI\\CData $data;
    public function __construct(FFI\\CData $data) { $this->data = $data; }
    public function getData(): FFI\\CData { return $this->data; }
    public function equals(uintmax_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): uintmax_t_ptr_ptr { return new uintmax_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int { return $this->data[$n] + 0; }
    public static function getType(): string { return \'uintmax_t*\'; }
}
class uintmax_t_ptr_ptr implements itest {
    private FFI\\CData $data;
    public function __construct(FFI\\CData $data) { $this->data = $data; }
    public function getData(): FFI\\CData { return $this->data; }
    public function equals(uintmax_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): uintmax_t_ptr_ptr_ptr { return new uintmax_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): uintmax_t_ptr { return new uintmax_t_ptr($this->data[$n]); }
    public static function getType(): string { return \'uintmax_t**\'; }
}
class uintmax_t_ptr_ptr_ptr implements itest {
    private FFI\\CData $data;
    public function __construct(FFI\\CData $data) { $this->data = $data; }
    public function getData(): FFI\\CData { return $this->data; }
    public function equals(uintmax_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): uintmax_t_ptr_ptr_ptr_ptr { return new uintmax_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): uintmax_t_ptr_ptr { return new uintmax_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return \'uintmax_t***\'; }
}
class uintmax_t_ptr_ptr_ptr_ptr implements itest {
    private FFI\\CData $data;
    public function __construct(FFI\\CData $data) { $this->data = $data; }
    public function getData(): FFI\\CData { return $this->data; }
    public function equals(uintmax_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): uintmax_t_ptr_ptr_ptr_ptr_ptr { return new uintmax_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): uintmax_t_ptr_ptr_ptr { return new uintmax_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return \'uintmax_t****\'; }
}';

    protected FFIMe $lib;
    protected Printer $printer;

    public function setUp(): void {
        $this->lib = new FFIMe(
            "/lib/x86_64-linux-gnu/libc.so.6",
            [
                __DIR__,
                __DIR__ . '/../include'
            ]
        );
    }

    public function tearDown(): void {
        @unlink(__DIR__ . '/basic_typedefsTest.result.php');
    }

    /**
     * @textdox Test basic parsing of typedefs
     */
    public function testCodeGen() {
        $this->lib->include(__DIR__ . '/basic_typedefsTest.h');
        $this->lib->codeGen("test\\test", __DIR__ . '/basic_typedefsTest.result.php');
        $this->assertFileExists(__DIR__ . '/basic_typedefsTest.result.php');
        $this->assertStringMatchesFormat(self::EXPECTED, trim(file_get_contents(__DIR__ . '/basic_typedefsTest.result.php')));
    }
}