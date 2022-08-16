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

    public function toValue(?CompiledType $type = null, $charConvert = true): string {
        $val = $this->value;
        if ($type && $this->type != $type) {
            if ($this->type->indirections) {
                $val = '$this->ffi->cast("' . $type->toValue() . '", ' . $val . ')';
            } elseif (!$type->indirections && ($this->type->rawValue === 'char') !== ($type->rawValue === 'char')) {
                if ($type->rawValue === 'char') {
                    $val = '\chr(' . $val . ')';
                } else {
                    $val = '\ord(' . $val . ')';
                }
            }
            return $this->cdata && $type->isNative ? '(' . $val . ')->cdata' : $val;
        } else {
            if ($this->cdata && $this->type->isNative) {
                $val = '(' . $val . ')->cdata';
            }
            if ($charConvert && !$this->type->indirections && $this->type->rawValue === 'char') {
                $val = '\ord(' . $val . ')';
            }
            return $val;
        }
    }

    public function toBool(): string {
        $value = $this->value;
        if ($this->cdata) {
            if ($this->type->isNative) {
                $value = '(' . $this->value . ')->cdata';
            } else {
                return '!FFI::isNull(' . $this->value . ')';
            }
        }
        if ($this->type->rawValue === 'char') {
            $value = '(' . $value . ' !== "\0")';
        }
        return $value;
    }

    public function withCurrent(string $newExpr, int $modifyPointer = 0): self {
        $type = $this->type;
        $cdata = $this->cdata;
        if ($modifyPointer) {
            if ($modifyPointer < 0) {
                $indirections = array_slice($type->indirections, 1);
            } else {
                $indirections = [];
            }
            $type = new CompiledType($type->value, $indirections, $type->rawValue);
            $cdata = !$type->isNative;
        }
        return new self($newExpr, $type, $cdata);
    }
}