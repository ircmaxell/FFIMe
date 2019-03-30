# FFIMe

This is a wrapper library for PHP 7.4's FFI extension.

You provide it with a shared object, and one or more header files, and it automatically generates the C structures and function signatures for you (just like doing it in C would).

Eventually, this will be more structured to provide a "nicer" interface to use the FFI itself.

## Usage:

Currently there are two modes of operation, an "inline" mode:

```php
$libc = (new FFIMe\FFIMe("/lib/x86_64-linux-gnu/libc.so.6"))
        ->include("stdio.h")
        ->build();

$libc->printf("test\n");
```

And a code generating mode:

```php
(new FFIMe\FFIMe("/lib/x86_64-linux-gnu/libc.so.6"))
        ->include("stdio.h")
        ->include("other.h")
        ->godeGen('full\\classname', 'path/to/file.php');

require 'path/to/file.php';
$libc = new full\classname;
$libc->printf("test\n");
```

The code generating mode is designed to be used in production, where you'd code generate during a build step and ship with your library.

This should now work for the majority of header files. Looking at some of the code, specifically the compiler, there is quite a bit of hard coding. So I don't expect every file to work out of the box. If you find a header file that doesn't work, just open a bug and we'll take a look.

Check out the [examples](examples/);