<?php

namespace FFIMe\Test\InlineFunctions;

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

static inline bar init_other_bar(int val, char *str) {
    return (bar){ val, str + val };
}

static inline void set_bar_ptr() {
    global_bar = &init_bar;
}

static inline const char *call_bar(int integer) {
    return global_bar(integer, "foo").str;
}

HEADER);

        $testCase = new generated\FunctionPointers\Defs;

        $testCase->global_bar = \Closure::fromCallable([$testCase, 'init_other_bar']);
        self::assertSame("oo", $testCase->call_bar(1)->toString());

        $testCase->set_bar_ptr();
        self::assertSame("foo", $testCase->call_bar(1)->toString());
    }
}

