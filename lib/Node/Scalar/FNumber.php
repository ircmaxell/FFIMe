<?php declare(strict_types=1);
namespace FFIMe\Node\Scalar;
use FFIMe\Node\Scalar;

class FNumber extends Scalar
{
    public float $value;

    public function __construct(float $value, array $attributes = []) {
        parent::__construct($attributes);
        $this->value = $value;
    }
    public function getSubNodeNames() : array {
        return ['value'];
    }
    
    public function getType() : string {
        return 'Scalar_FNumber';
    }
}