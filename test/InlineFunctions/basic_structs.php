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

        $this->assertSame(0, $foo->getData()->value[0]);
        $this->assertSame(1, $foo->getData()->value[1]);
        $this->assertSame(2, $foo->getData()->second_value);
        $this->assertSame("some str", \FFI::string($foo->getData()->str));
        $this->assertSame(3, $foo->getData()->bar->val);
        $this->assertSame(3, $testCase->global_bar->getData()->val);

        $testCase->update_foo_bar($foo->addr());

        $this->assertSame(1, $foo->getData()->bar->val);

        \FFI::free($str->getData());
    }
}

