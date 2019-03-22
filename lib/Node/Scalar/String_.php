<?php declare(strict_types=1);
namespace FFIMe\Node\Scalar;
use FFIMe\Node\Scalar;

class String_ extends Scalar
{

    public string $value;

    public function __construct(string $value, array $attributes = []) {
        parent::__construct($attributes);
        $this->value = $value;
    }
    public function getSubNodeNames() : array {
        return ['value'];
    }
    
    public function getType() : string {
        return 'Scalar_String';
    }
}