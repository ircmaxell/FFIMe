<?php
require __DIR__ . '/../../vendor/autoload.php';

$libc = (new FFIMe\FFIMe("/lib/x86_64-linux-gnu/libc.so.6"))
    ->include(__DIR__ . "/test.h")
    ->codeGen('test\\test', __DIR__ . '/test.php');


require __DIR__ . '/test.php';
$test = new Test\Test;

var_dump($test->add2(1, 2));
echo "Done\n";