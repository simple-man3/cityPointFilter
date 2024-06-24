<?php

namespace CP\Filter\Tokens;

class LikeExpr extends BinaryExpression
{
    private string $pattern;

    public function __construct(ASTNode $left, ASTNode $right) {
        parent::__construct($left, $right);
        $this->parse();
    }

    private function parse(): void {
        $this->pattern = $this->right->apply([]);
    }

    public function apply(array $data): bool {
        if (!isset($data[$this->left->apply([])])) {
            return false;
        }

        $fieldValue = $data[$this->left->apply([])];
        return (bool) preg_match("/{$this->pattern}/", $fieldValue);
    }
}