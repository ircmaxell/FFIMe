<?php

namespace FFIMe;

class CompiledFunctionType extends CompiledType {
    public CompiledType $return;
    /** @var CompiledType[] */
    public array $args;
    /** @var string[]|null[] */
    public array $argNames;
    public bool $isVariadic;

    /** @param CompiledType[] $args */
    public function __construct(CompiledType $return, array $args, array $argNames, bool $isVariadic, array $indirections = []) {
        parent::__construct('function type', $indirections);
        $this->return = $return;
        if ($args && $args[0]->value === 'void' && $args[0]->indirections() === 0) {
            $args = $argNames = [];
        }
        $this->args = $args;
        $this->argNames = $argNames;
        $this->isVariadic = $isVariadic;
    }

    public function toValue(?string $compiledBaseType = null): string {
        return "{$this->return->toValue()}(" . parent::toValue('') . ")(" . implode(', ', array_map(static function(CompiledType $type) { return $type->toValue(); }, $this->args)) . ($this->isVariadic ? ", ..." : "") . ")";
    }
}