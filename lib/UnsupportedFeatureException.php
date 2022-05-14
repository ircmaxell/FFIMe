<?php

namespace FFIMe;

class UnsupportedFeatureException extends \Exception {
    const COMPLEX = 1;

    public int $feature;

    public function __construct(int $feature, string $message = "") {
        $this->feature = $feature;
        parent::__construct($message);
    }
}
