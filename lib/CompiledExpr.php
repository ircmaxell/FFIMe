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

    public function toValue(?CompiledType $type = null): string {
        $val = $this->value;
        if ($type && $this->type != $type) {
            if ($this->type->indirections) {
                $val = '$this->ffi->cast("' . $type->toValue() . '", ' . $val . ')';
            } elseif (($this->type->rawValue === 'char') !== ($type->rawValue === 'char')) {
                $val = '\chr(' . $val . ')';
            }
        } else {
            $type = $this->type;
        }
        return $this->cdata && $type->isNative ? '(' . $val . ')->cdata' : $val;
    }

    public function withCurrent(string $newExpr, int $modifyPointer = 0): self {
        $type = $this->type;
        $cdata = $this->cdata;
        if ($modifyPointer) {
            if ($modifyPointer < 0) {
                $indirections = array_slice($type->indirections, 1, 0);
            } else {
                $indirections = [];
            }
            $type = new CompiledType($type->value, $indirections, $type->rawValue);
            $cdata = !$type->isNative;
        }
        return new self($newExpr, $type, $cdata);
    }
}