# FFIMe

This is a wrapper library for PHP's FFI extension.

You provide it with a shared object, and one or more header files, and it automatically generates the C structures and function signatures for you (just like doing it in C would).
It then provides wrapper classes for all C structures and functions to provide a fully typed experience.

## Usage:

Currently there are two modes of operation, an "inline" mode:

```php
$libc = (new FFIMe\FFIMe(FFIMe\FFIMe::LIBC))
        ->include("stdio.h")
        ->build();

$libc->printf("test\n");
```

And a code generating mode:

```php
(new FFIMe\FFIMe(FFIMe\FFIMe::LIBC))
        ->include("stdio.h")
        ->include("other.h")
        ->codeGen('full\\classname', 'path/to/file.php');

require 'path/to/file.php';
$libc = full\classname::ffi();
$libc->printf("test\n");
```

The code generating mode is designed to be used in production, where you'd code generate during a build step and ship with your library.

This should now work for the majority of header files. Looking at some of the code, specifically the compiler, there is a bit of hard coding necessary. So I don't expect every file to work out of the box. If you find a header file that doesn't work, just open a bug and we'll take a look.

Check out the [examples](examples/);

## Slimming it down

Generating FFI for large projects may result in codefiles counting tens or hundreds of thousands of lines, though only a few hundred or thousand are actually needed. This may result in a non-trivial overhead, which can be removed after development.

```php
$ffi = (new FFIMe\FFIMe(FFIMe\FFIMe::LIBC))
        ->include("stdio.h");
        
$ffi->codeGenWithInstrumentation('full\\classname', 'path/to/file.php');

// Run some code providing 100% coverage of all code using FFI
(new PHPUnit\TextUI\Command)->run([$argv[0], "test"], false);

$ffi->codeGen('full\\classname', 'path/to/file.php');
```
