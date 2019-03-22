<?php 

error_reporting(~0);
set_time_limit(1);

require __DIR__ . '/vendor/autoload.php';

$libjit = new FFIMe\FFIMe('/opt/lib/libjit.so.0');
$libjit->include(__DIR__ . '/test/headers/mathtest.h');
$libjit->build();

var_dump($libjit->jit_type_int);

