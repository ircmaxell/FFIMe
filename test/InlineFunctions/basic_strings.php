<?php

namespace FFIMe\Test\InlineFunctions;

class BasicStrings extends InlineTestcase {
    public function testBasicStringManipulation() {
        $this->compile(<<<HEADER
#include <stdio.h>
#include <ctype.h>
#include <stdlib.h>
#include <string.h>

static inline char *getUppercaseString(char *str) {
    int len = strlen(str);
	char *upper = malloc(len + 1), *ret;
	for (int i = 0; i < len; ++i) {
		upper[i] = toupper(*(str++));
	}
	upper[len] = 0;
	ret = malloc(50);
	sprintf(ret, "len: %d str: %s", strlen(upper), upper);
	free(upper);
	return ret;
}
HEADER);

        $testCase = generated\BasicStrings\Defs::ffi();
        $str = $testCase->getUppercaseString("lower case string");
        $this->assertSame('len: 17 str: LOWER CASE STRING', $str->toString());
        $testCase->free($str);
    }
}

