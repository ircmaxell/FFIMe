<?php
require __DIR__ . '/../../vendor/autoload.php';

$libc = (new FFIMe\FFIMe("/lib/x86_64-linux-gnu/libc.so.6"))
    ->include("stdio.h")
    ->build();

$libc->printf("test\n");