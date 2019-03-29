<?php 

error_reporting(~0);
set_time_limit(1);

require __DIR__ . '/vendor/autoload.php';

$libjit = new FFIMe\FFIMe('/opt/lib/libjit.so.0');
$libjit->include('/opt/include/jit/jit.h');
$libjit->codeGen('libjit/libjit', __DIR__ . '/test.libjit.php');


