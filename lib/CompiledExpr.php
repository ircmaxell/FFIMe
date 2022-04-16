<?php

namespace FFIMe;

class CompiledExpr
{
    public string $value;
    public bool $cdata;
    public CompiledType $type;

    public function __construct(string $value, ?CompiledType $type = null, bool $cdata = false) {
        $this->value = $value;
        $this->type = $type ?? new CompiledType('int');
        $this->cdata = $cdata;
    }

    public function toValue(?CompiledType $type = null) {
        $val = $this->value;
        if ($type && $this->type != $type) {
            if ($this->type->pointer) {
                $val = '$this->ffi->cast("' . $type->rawValue . str_repeat('*', $type->pointer) . '", ' . $val . ')';
            } elseif ($this->type->isChar != $type->isChar) {
                $val = '\chr(' . $val . ')';
            }
        } else {
            $type = $this->type;
        }
        return $this->cdata && !$type->pointer ? '(' . $val . ')->cdata' : $val;
    }

    public function withCurrent(string $newExpr, int $modifyPointer = 0) {
        $type = $this->type;
        if ($modifyPointer) {
            $type = clone $this->type;
            $type->pointer += $modifyPointer;
        }
        return new self($newExpr, $type, $this->cdata);
    }
}