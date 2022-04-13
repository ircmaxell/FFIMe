<?php

namespace FFIMe;

class CompiledType
{
    public string $value;
    public string $rawValue;
    public int $pointer;
    public bool $isChar;

    public function __construct(string $value, int $pointer = 0, bool $isChar = false, ?string $rawValue = null) {
        $this->value = $value;
        $this->pointer = $pointer;
        $this->isChar = $isChar;
        $this->rawValue = $rawValue ?? ($isChar ? 'char' : $value);
    }

    public function toValue() {
        return $this->pointer ? '(' . $this->value . ')->cdata' : $this->value;
    }

    public function withCurrent(string $newExpr) {
        return new self($newExpr, $this->pointer);
    }
}