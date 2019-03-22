<?php

namespace FFIMe;

class CScope {

    private array $entries = [];

    public function typedef(string $identifier): void {
        $this->entries[$identifier] = CTokens::T_TYPEDEF_NAME;
    }

    public function enum(string $identifier): void {
        $this->entries[$identifier] = CTokens::T_ENUMERATION_CONSTANT;
    }

    public function lookup(string $identifier): int {
        if (isset($this->entries[$identifier])) {
            return $this->entries[$identifier];
        }
        return CTokens::T_IDENTIFIER;
    }
}