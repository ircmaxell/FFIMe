<?php
require __DIR__ . '/../../vendor/autoload.php';

$libc = (new FFIMe\FFIMe(\FFIMe\FFIMe::LIBC))
    ->include("stdio.h")
    ->build();

$libc->printf("test\n");