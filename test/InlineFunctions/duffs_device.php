<?php

namespace FFIMe\Test\InlineFunctions;

class DuffsDevice extends InlineTestcase {
    public function testSimpleDuffsDevice() {
        $this->compile(<<<HEADER
static inline int calcHash(int len, const char *str) {
    int result = 0;
    int mul = 1;
    const char *end = str + len;
    str -= (4 - len) & 0x3;
    switch (len & 0x3) {
        case 0: ;
        while (str < end) {
            result ^= str[0] * mul;
            case 3: result ^= str[1] * mul * 9;
            case 2: result ^= str[2] * mul * 9 * 9;
            case 1: result ^= str[3] * mul * 9 * 9 * 9;
            mul *= 9 * 9 * 9 * 9;
            str += 4;
        }
    }
    return result;
}
HEADER);

        $testCase = generated\DuffsDevice\Defs::ffi();

        $this->assertSame(32 * (9 ** 3), $testCase->calcHash(1, \chr(32)));
        $this->assertSame((32 * (9 ** 3)) ^ ((9 ** 4) * 64) ^ ((9 ** 5) * 16) ^ ((9 ** 6) * 48) ^ ((9 ** 7) * 80), $testCase->calcHash(5, \chr(32) . \chr(64) . \chr(16) . \chr(48) . \chr(80)));
    }
}

