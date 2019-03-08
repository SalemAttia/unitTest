<?php

namespace TDD\Test;

require dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
use PHPUnit\Framework\TestCase;
use TDD\Receipt;

class ReceiptTest extends TestCase
{
    /** @var Receipt $Receipt */
    public $Receipt;

    public function setUp()
    {
        $this->Receipt = new Receipt();
    }

    public function tearDown()
    {
        unset($this->Receipt);
    }

    public function testTotal()
    {
        $values = [0, 2, 4, 8];
        $coupon = null;
        $this->assertEquals(
            14,
            $this->Receipt->total($values, $coupon),
            'when Summing the total should equal 14'
        );
    }

    public function testTotalAndCoupon()
    {
        $values = [0, 2, 4, 8];
        $coupon = 0.20;
        $this->assertEquals(
            11.2,
            $this->Receipt->total($values, $coupon),
            'when Summing the total should equal 14'
        );
    }

    public function testTax()
    {
        $inputAmount = 10.00;
        $taxInput = 0.10;
        $output = $this->Receipt->tax($inputAmount, $taxInput);
        $this->assertEquals(
            1.00,
            $output,
            'the tax calculation should equal 1.00'
            );
    }
}
