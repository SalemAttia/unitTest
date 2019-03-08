<?php

namespace TDD;

class Receipt
{
    public function total(array  $items = [], ?float $coupon): float
    {
        /** @var float $sum */
        $sum = array_sum($items);
        if (!is_null($coupon)) {
            return $sum - ($sum * $coupon);
        }

        return $sum;
    }

    public function tax(float $amount, float $tax): float
    {
        return $amount * $tax;
    }
}
