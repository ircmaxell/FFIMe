<?php

namespace FFIMe;

class CompiledType
{
    public string $value;
    public string $rawValue;
    public int $pointer;
    public bool $isChar;
    public bool $isNative;

    public function __construct(string $value, int $pointer = 0, bool $isChar = false, ?string $rawValue = null) {
        $this->value = $value;
        $this->pointer = $pointer;
        $this->isChar = $isChar;
        $this->rawValue = $rawValue ?? ($isChar ? 'char' : $value);
        $this->isNative = !$pointer && $this->baseTypeIsNative();
    }

    public function toValue() {
        return $this->pointer ? '(' . $this->value . ')->cdata' : $this->value;
    }

    public function baseTypeIsNative() {
        return $this->value === 'int' || $this->value === 'float';
    }

    public function withCurrent(string $newExpr) {
        return new self($newExpr, $this->pointer);
    }
}