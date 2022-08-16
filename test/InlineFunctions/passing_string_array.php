<?php

namespace FFIMe\Test\InlineFunctions;

use FFIMe\Test\InlineFunctions\generated\BasicStructs\string_;
use FFIMe\Test\InlineFunctions\generated\void_ptr;

class PassingStringArray extends InlineTestcase {
    public function testBasicStructManipulation() {
        $this->compile(<<<HEADER
struct foo {
    char str1[4];
    char str2[4];
    unsigned char isNull;
};

static inline void copystr(char *from, char *to) {
    do {
        *(to++) = *from;
    } while (*(from++));
}

static inline struct foo collect_strs(const char **str) {
    struct foo foo;
    copystr(*(str++), foo.str1);
    copystr(*(str++), foo.str2);
    foo.isNull = *str == (void*)0;
    return foo;
}
HEADER);

        $testCase = new generated\PassingStringArray\Defs;
        $foo = $testCase->collect_strs(["foo", "bar", null]);

        $this->assertSame("foo", $foo->str1->toString());
        $this->assertSame("bar", $foo->str2->toString());
        $this->assertSame(1, $foo->isNull);
    }
}

