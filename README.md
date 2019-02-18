

# FFIMe

This is a wrapper library for PHP 7.4's FFI extension.

You provide it with a shared object, and one or more header files, and it automatically generates the C structures and function signatures for you (just like doing it in C would).

Eventually, this will be more structured to provide a "nicer" interface to use the FFI itself.

Usage:

```php
$libc = new FFIMe\FFIMe("/lib/x86_64-linux-gnu/libc.so.6");
$libc->include("/usr/include/printf.h")->build();

$libc->printf("test");
```

Note: This does not work yet, except for certain relatively simple header files (such as those used by libjit, libgccjit, etc). Much more support for operators is needed.