<?php
require __DIR__ . '/../../vendor/autoload.php';

(new FFIMe\FFIMe(FFIMe\FFIMe::LIBC))
    ->include(__DIR__ . "/test.h")
    ->codeGen('test\\test', __DIR__ . '/test.php');


require __DIR__ . '/test.php';
$test = Test\Test::ffi();

var_dump($test->add2(1, 2));
echo "Done\n";