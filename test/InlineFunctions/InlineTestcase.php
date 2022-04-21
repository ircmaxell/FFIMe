<?php

namespace FFIMe\Test\InlineFunctions;

use FFIMe\FFIMe;

abstract class InlineTestcase extends \PHPUnit\Framework\TestCase {
    public function compile($header): void {
        $classname = substr(strrchr(get_class($this), '\\'), 1);
        @mkdir(__DIR__ . '/generated/' . $classname);
        $headerfile = __DIR__ . '/generated/' . $classname . '/defs.h';
        file_put_contents($headerfile, $header);

        $ffi = new FFIMe(
            PHP_OS_FAMILY === "Darwin" ? "/usr/lib/libSystem.B.dylib" : "/lib/x86_64-linux-gnu/libc.so.6",
            [
                __DIR__,
            ]
        );
        $ffi->include($headerfile);

        $phpfile = __DIR__ . '/generated/' . $classname . '/defs.php';
        $ffi->codeGen(__NAMESPACE__ . '\\generated\\'. $classname . '\\Defs', $phpfile);
    }
}
