<?php

namespace TDD;

class Receipt
{
    public function total(array  $items = []): float
    {
        return array_sum($items);
    }

    public function tax(float $amount, float $tax): float
    {
        return $amount * $tax;
    }
}
