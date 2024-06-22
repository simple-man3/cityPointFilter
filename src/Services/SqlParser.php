<?php

namespace CP\Filter\Services;

use CP\Filter\Tokens\LikeExpr;

class SqlParser
{
    public function parseLikeExpression($expression): ?LikeExpr
    {
        if (preg_match('/LIKE \(([^,]+), "([^"]+)"\)/', $expression, $matches)) {
            return new LikeExpr($matches[1], $matches[2]);
        }

        return null;
    }
}