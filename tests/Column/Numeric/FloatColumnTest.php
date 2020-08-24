<?php

namespace BronOS\PhpSqlSchema\Tests\Column\Numeric;


use BronOS\PhpSqlSchema\Column\Numeric\FloatColumn;
use PHPUnit\Framework\TestCase;

class FloatColumnTest extends TestCase
{
    public function test__construct()
    {
        $int = new FloatColumn(
            'id',
            4,
            3,
            true,
            false,
            10.5,
            false,
            "Float ID"
        );

        $this->assertEquals('FLOAT', $int->getType());
        $this->assertEquals('id', $int->getName());
        $this->assertEquals(4, $int->getPrecision());
        $this->assertEquals(3, $int->getScale());
        $this->assertTrue($int->isUnsigned());
        $this->assertFalse($int->isNullable());
        $this->assertEquals('10.5', $int->getDefault());
        $this->assertFalse($int->isZerofill());
        $this->assertEquals('Float ID', $int->getComment());
    }
}
