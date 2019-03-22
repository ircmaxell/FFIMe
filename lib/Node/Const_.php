<?php declare(strict_types=1);

namespace FFIMe\Node;

use FFIMe\NodeAbstract;

/**
 * Represents a non-namespaced name. Namespaced names are represented using Name nodes.
 */
class Const_ extends NodeAbstract
{
    public Identifier $name;

    public function __construct(string $name, array $attributes = []) {
        parent::__construct($attributes);
        $this->name = new Identifier($name);
    }

    public function getSubNodeNames() : array {
        return ['name'];
    }
    
    public function getType() : string {
        return 'Const';
    }
}