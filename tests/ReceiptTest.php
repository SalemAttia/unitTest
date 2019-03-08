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
            $this->Receipt->total($coupon, $values),
            'when Summing the total should equal 14'
        );
    }

    public function testTotalAndCoupon()
    {
        $values = [0, 2, 4, 8];
        $coupon = 0.20;
        $this->assertEquals(
            11.2,
            $this->Receipt->total($coupon, $values),
            'when Summing the total should equal 14'
        );
    }

    public function testPostTaxTotalUseStub()
    {
        $Receipt = $this->getMockBuilder('TDD\Receipt')
            ->setMethods(['tax', 'total'])
            ->getMock();
        $Receipt->method('total')
            ->will($this->returnValue(10.00));
        $Receipt->method('tax')
            ->will($this->returnValue(1.00));
        $result = $Receipt->postTaxTotal([1, 2, 5, 8], 0.20, null);
        $this->assertEquals(11.00, $result);
    }

    public function testPostTaxTotalUseMock()
    {
        $items = [1, 2, 5, 8];
        $tax = 0.20;
        $coupon = null;
        $Receipt = $this->getMockBuilder('TDD\Receipt')
            ->setMethods(['tax', 'total'])
            ->getMock();
        $Receipt->expects($this->once())
            ->method('total')
            ->with($coupon, $items)
            ->will($this->returnValue(10.00));
        $Receipt->expects($this->once())
            ->method('tax')
            ->with(10.00, $tax)
            ->will($this->returnValue(1.00));
        $result = $Receipt->postTaxTotal($items, $tax, null);
        $this->assertEquals(11.00, $result);
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
