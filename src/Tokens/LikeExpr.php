<?php

namespace CP\Filter\Tokens;

class LikeExpr
{
    public $value;
    public $pattern;

    public function __construct($value, $pattern) {
        $this->value = $value;
        $this->pattern = $pattern;
    }
}