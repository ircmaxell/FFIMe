<?php

namespace FFIMe\Test\InlineFunctions;

use FFIMe\Test\InlineFunctions\generated\BasicStructs\string_;
use FFIMe\Test\InlineFunctions\generated\void_ptr;

class BasicStructs extends InlineTestcase {
    public function testBasicStructManipulation() {
        $this->compile(<<<HEADER
struct bar {
    int val;
};

struct foo {
    int value[2];
    int second_value;
    const char *str;
    struct bar bar;
};

typedef struct bar bar_t;
bar_t global_bar;

static inline bar_t init_bar(int val) {
    return global_bar = (struct bar){ val };
}

static inline struct foo init_foo(const char *str) {
    struct foo foo = { 0, 1, 2, .str = str };
    foo.bar = init_bar(3);
    return foo;
}

static inline void update_foo_bar(struct foo *foo) {
    foo->bar = (bar_t){ .val = foo->value[1] };
}
HEADER);

        $testCase = new generated\BasicStructs\Defs;
        $str = string_::persistentZero("some str");
        $foo = $testCase->init_foo($str);

        $this->assertSame(0, $foo->value[0]);
        $this->assertSame(1, $foo->value[1]);
        $this->assertSame(2, $foo->second_value);
        $this->assertSame("some str", $foo->str->toString());
        $this->assertSame(3, $foo->bar->val);
        $this->assertSame(3, $testCase->global_bar->val);

        $testCase->update_foo_bar($foo->addr());

        $this->assertSame(1, $foo->bar->val);

        \FFI::free($str->getData());
    }
}

