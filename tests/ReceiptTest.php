<?php namespace TDD\Test;

require dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
use PHPUnit\Framework\TestCase;
use TDD\Receipt;

class ReceiptTest extends TestCase
{
    public function testTotal()
    {
        $Receipt = new Receipt();
        $values = [0, 2, 4, 8];
        $this->assertEquals(
            14,
            $Receipt->total($values),
            'when Summing the total should equal 14'
        );
    }
}
