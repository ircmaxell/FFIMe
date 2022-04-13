<?php

namespace FFIMe;

class CompiledExpr
{
    public string $value;
    public CompiledType $type;

    public function __construct(string $value, ?CompiledType $type = null) {
        $this->value = $value;
        $this->type = $type ?? new CompiledType('int');
    }

    public function toValue() {
        return $this->type->pointer ? '(' . $this->value . ')->cdata' : $this->value;
    }

    public function withCurrent(string $newExpr, int $modifyPointer = 0) {
        $type = $this->type;
        if ($modifyPointer) {
            $type = clone $this->type;
            $type->pointer += $modifyPointer;
        }
        return new self($newExpr, $type);
    }
}