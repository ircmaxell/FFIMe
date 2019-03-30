<?php
require __DIR__ . '/../../vendor/autoload.php';

(new FFIMe\FFIMe("/lib/x86_64-linux-gnu/libc.so.6"))
    ->include("stdio.h")
    ->codeGen('stdio\\stdio', __DIR__ . '/stdio.php');

require __DIR__ . '/stdio.php';

$libc = new stdio\stdio;

$libc->printf("test\n");