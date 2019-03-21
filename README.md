

# FFIMe

This is a wrapper library for PHP 7.4's FFI extension.

You provide it with a shared object, and one or more header files, and it automatically generates the C structures and function signatures for you (just like doing it in C would).

Eventually, this will be more structured to provide a "nicer" interface to use the FFI itself.

Usage:

```php
$libc = new FFIMe\FFIMe("/lib/x86_64-linux-gnu/libc.so.6");
$libc->include("printf.h")->build();

$libc->printf("test");
```

This should now work for the majority of header files. Looking at some of the code, specifically the compiler, there is quite a bit of hard coding. So I don't expect every file to work out of the box. If you find a header file that doesn't work, just open a bug and we'll take a look.