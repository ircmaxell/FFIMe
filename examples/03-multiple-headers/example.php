<?php
require __DIR__ . '/../../vendor/autoload.php';

$libc = (new FFIMe\FFIMe(\FFIMe\FFIMe::LIBC))
    ->include("stdio.h")
    ->include("ctype.h")
    ->build();

// from stdio.h
$libc->printf("test\n");

// from ctype.h
if ($libc->isalpha(ord("h"))) {
    echo "It's alpha\n";
} else {
    echo "It's not alpha\n";
}