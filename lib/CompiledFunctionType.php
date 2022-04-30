<?php

namespace FFIMe;

class CompiledFunctionType extends CompiledType {
    public ?CompiledType $return;
    /** @var CompiledType[] */
    public array $args;
    public bool $isVariadic;

    /** @param CompiledType[] $args */
    public function __construct(?CompiledType $return, array $args, bool $isVariadic, array $indirections = []) {
        parent::__construct('function type', $indirections);
        $this->return = $return;
        $this->args = $args;
        $this->isVariadic = $isVariadic;
    }

    public function toValue(?string $compiledBaseType = null): string {
        return "{$this->return->toValue()}(" . parent::toValue('') . ")(" . implode(', ', array_map(static function(CompiledType $type) { return $type->toValue(); }, $this->args)) . ($this->isVariadic ? ", ..." : "") . ")";
    }
}