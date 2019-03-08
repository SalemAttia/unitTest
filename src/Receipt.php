<?php

namespace TDD;

class Receipt
{
    public function total(?float $coupon, array  $items = []): float
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
