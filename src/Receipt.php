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

    public function postTaxTotal(array $items, float $tax, ?float $coupon): float
    {
        /** @var float $subtotal */
        $subtotal = $this->total($coupon, $items);

        return $subtotal + $this->tax($subtotal, $tax);
    }
}
