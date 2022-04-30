<?php

namespace FFIMe\Test\InlineFunctions;

use FFI\CData;
use FFIMe\Test\InlineFunctions\generated\FunctionPointers\string_;
use FFIMe\Test\InlineFunctions\generated\void_ptr;

class FunctionPointers extends InlineTestcase {
    public function testFunctionPointerUsage() {
        $this->compile(<<<HEADER
typedef struct {
    int integer;
    char *str;
} bar;

bar (*global_bar)(int integer, char *str);

static inline bar init_bar(int val, char *str) {
    return (bar){ val, str };
}

static inline void set_bar_ptr() {
    global_bar = &init_bar;
}

static inline const char *call_bar(int integer) {
    return global_bar(integer, "foo").str;
}

HEADER);

        $testCase = new generated\FunctionPointers\Defs;

        \FFI::addr($testCase->global_bar->getData())[0] = fn(int $val, CData $str): CData => $testCase->init_bar($val, new string_($str))->getData();
        self::assertSame("foo", $testCase->call_bar(0)->toString());

        $testCase->set_bar_ptr();
        self::assertSame("foo", $testCase->call_bar(0)->toString());
    }
}

