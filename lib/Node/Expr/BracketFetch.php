<?php declare(strict_types=1);
namespace FFIMe\Node\Expr;
use FFIMe\Node\Expr;

class BracketFetch extends Expr
{

    public Expr $expr;
    public Expr $dim;

    public function __construct(Expr $expr, Expr $dim, array $attributes = []) {
        parent::__construct($attributes);
        $this->expr = $expr;
        $this->dim = $dim;
    }
    public function getSubNodeNames() : array {
        return ['expr', 'dim'];
    }
    
    public function getType() : string {
        return 'Expr_BracketFetch';
    }
}