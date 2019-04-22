<?php declare(strict_types=1);
namespace FFIMe\Test;
use FFIMe\FFIMe;
use PHPUnit\Framework\TestCase;

/**
 * Note: this is a generated file, do not edit this!!!
 */
class basic_stringsTest extends TestCase {

    const EXPECTED = '<?php namespace %s;
use FFI;
interface itest {}
class test {
    const SOFILE = \'%s\';
    const HEADER_DEF = \'void setFoo(char *value);
char * getFoo();
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
    public function setFoo(?string $p0): void {
        $this->ffi->setFoo($p0);
    }
    public function getFoo(): ?string_ {
        $result = $this->ffi->getFoo();
        return $result === null ? null : new string_($result);
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
}';

    protected FFIMe $lib;
    protected Printer $printer;

    public function setUp(): void {
        $this->lib = new class(
            "/lib/x86_64-linux-gnu/libc.so.6",
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
        @unlink(__DIR__ . '/basic_stringsTest.result.php');
    }

    /**
     * @textdox Test basic parsing of strings
     */
    public function testCodeGen() {
        $this->lib->include(__DIR__ . '/basic_stringsTest.h');
        $this->lib->codeGen("test\\test", __DIR__ . '/basic_stringsTest.result.php');
        $this->assertFileExists(__DIR__ . '/basic_stringsTest.result.php');
        $this->assertStringMatchesFormat(self::EXPECTED, trim(file_get_contents(__DIR__ . '/basic_stringsTest.result.php')));
    }
}