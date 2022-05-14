<?php

namespace FFIMe;

class BuiltinFunction {
    /** @var BuiltinFunction[] */
    public static array $registry = [];

    public string $name;
    public CompiledType $type;
    public string $body;

    public function __construct(string $name, CompiledType $type, string $body) {
        $this->name = $name;
        $this->type = $type;
        $this->body = $body;

        self::$registry[$name] = $this;
    }

    public function print(): array {
        $return[] = "    public function " . Compiler::COMPILED_PREFIX . $this->name . $this->body;
        return $return;
    }
}

new BuiltinFunction("__builtin_bswap16", new CompiledType("int", rawValue: "uint16_t"), '(int $val) { return ($val >> 8) | (($val << 8) & 0xff00); }');
new BuiltinFunction("__builtin_bswap32", new CompiledType("int", rawValue: "uint32_t"), '(int $val) { return (($val & 0xff000000) >> 24) | (($val & 0xff0000) >> 8) | (($val & 0xff00) << 8) | (($val & 0xff) << 24); }');
new BuiltinFunction("__builtin_bswap64", new CompiledType("int", rawValue: "uint64_t"), '(int $val) { return (($val & 0xff00000000000000) >> 56) | (($val & 0xff000000000000) >> 40) | (($val & 0xff0000000000) >> 24) | (($val & 0xff00000000) >> 8) | (($val & 0xff000000) << 8) | (($val & 0xff0000) << 24) | (($val & 0xff00) << 40) | (($val & 0xff) << 56); }');
new BuiltinFunction("__builtin_object_size", new CompiledType("int", rawValue: "size_t"), '(FFI\CData $ptr, int $type) { return $type <= 1 ? -1 : 0; }'); // Defaults when "conditions not met"

// __builtin___*_chk functions
new BuiltinFunction("__builtin___memcpy_chk", new CompiledType("void", [null]), '(FFI\CData $dest, FFI\CData $src, int $len, int $destlen) { return $this->ffi->memcpy($dest, $src, $len); }');
new BuiltinFunction("__builtin___mempcpy_chk", new CompiledType("void", [null]), '(FFI\CData $dest, FFI\CData $src, int $len, int $destlen) { return $this->ffi->mempcpy($dest, $src, $len); }');
new BuiltinFunction("__builtin___memmove_chk", new CompiledType("void", [null]), '(FFI\CData $dest, FFI\CData $src, int $len, int $destlen) { return $this->ffi->memmove($dest, $src, $len); }');
new BuiltinFunction("__builtin___memset_chk", new CompiledType("void", [null]), '(FFI\CData $dest, int $c, int $len, int $destlen) { return $this->ffi->memset($dest, $c, $len); }');
new BuiltinFunction("__builtin___strcpy_chk", new CompiledType("int", [null], rawValue: "char"), '(FFI\CData $dest, FFI\CData $src, int $destlen) { return $this->ffi->strcpy($dest, $src); }');
new BuiltinFunction("__builtin___strncpy_chk", new CompiledType("int", [null], rawValue: "char"), '(FFI\CData $dest, FFI\CData $src, int $len, int $destlen) { return $this->ffi->strncpy($dest, $src, $len); }');
new BuiltinFunction("__builtin___stpcpy_chk", new CompiledType("int", [null], rawValue: "char"), '(FFI\CData $dest, FFI\CData $src, int $destlen) { return $this->ffi->stpcpy($dest, $src); }');
new BuiltinFunction("__builtin___strcat_chk", new CompiledType("int", [null], rawValue: "char"), '(FFI\CData $dest, FFI\CData $src, int $destlen) { return $this->ffi->strcat($dest, $src); }');
new BuiltinFunction("__builtin___strncat_chk", new CompiledType("int", [null], rawValue: "char"), '(FFI\CData $dest, FFI\CData $src, int $len, int $destlen) { return $this->ffi->strncat($dest, $src, $len); }');
new BuiltinFunction("__builtin___sprintf_chk", new CompiledType("int"), '(FFI\CData $buf, int $flag, int $destlen, FFI\CData $fmt, ...$args) { return $this->ffi->sprintf($buf, $fmt, ...$args); }');
new BuiltinFunction("__builtin___snprintf_chk", new CompiledType("int"), '(FFI\CData $buf, int $maxlen, int $flag, int $destlen, FFI\CData $fmt, ...$args) { return $this->ffi->snprintf($buf, $maxlen, $fmt, ...$args); }');
new BuiltinFunction("__builtin___vsprintf_chk", new CompiledType("int"), '(FFI\CData $buf, int $flag, int $destlen, FFI\CData $fmt, FFI\CData $va_list) { return $this->ffi->vsprintf($buf, $fmt, $va_list); }');
new BuiltinFunction("__builtin___vsnprintf_chk", new CompiledType("int"), '(FFI\CData $buf, int $maxlen, int $flag, int $destlen, FFI\CData $fmt, FFI\CData $va_list) { return $this->ffi->vsnprintf($buf, $maxlen, $fmt, $va_list); }');
new BuiltinFunction("__builtin___printf_chk", new CompiledType("int"), '(int $flag, FFI\CData $fmt, ...$args) { return $this->ffi->printf($fmt, ...$args); }');
new BuiltinFunction("__builtin___vprintf_chk", new CompiledType("int"), '(int $flag, FFI\CData $fmt, FFI\CData $va_list) { return $this->ffi->vprintf($fmt, $va_list); }');
new BuiltinFunction("__builtin___fprintf_chk", new CompiledType("int"), '(FFI\CData $stream, int $flag, FFI\CData $fmt, ...$args) { return $this->ffi->fprintf($fmt, ...$args); }');
new BuiltinFunction("__builtin___vfprintf_chk", new CompiledType("int"), '(FFI\CData $stream, int $flag, FFI\CData $fmt, FFI\CData $va_list) { return $this->ffi->vfprintf($fmt, $va_list); }');
