<?php

namespace TDD\Test;

require dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
use PHPUnit\Framework\TestCase;
use TDD\Receipt;

class ReceiptTest extends TestCase
{

    /** @var Receipt */
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
        $this->assertEquals(
            14,
            $this->Receipt->total($values),
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
