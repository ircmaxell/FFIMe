<?php
require __DIR__ . '/../../vendor/autoload.php';

(new FFIMe\FFIMe(\FFIMe\FFIMe::LIBC))
    ->include("stdio.h")
    ->codeGen('stdio\\stdio', __DIR__ . '/stdio.php');

require __DIR__ . '/stdio.php';

$libc = stdio\stdio::ffi();

$libc->printf("test\n");