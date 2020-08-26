<?php

namespace BronOS\PhpSqlSchema\Tests\Column\Numeric;


use BronOS\PhpSqlSchema\Column\Numeric\DoubleColumn;
use PHPUnit\Framework\TestCase;

class DoubleColumnTest extends TestCase
{
    public function test__construct()
    {
        $column = new DoubleColumn(
            'id',
            4,
            3,
            true,
            false,
            10.5,
            false,
            "Double ID"
        );

        $this->assertEquals('DOUBLE', $column->getType());
        $this->assertEquals('id', $column->getName());
        $this->assertEquals(4, $column->getPrecision());
        $this->assertEquals(3, $column->getScale());
        $this->assertTrue($column->isUnsigned());
        $this->assertFalse($column->isNullable());
        $this->assertEquals('10.5', $column->getDefault());
        $this->assertFalse($column->isZerofill());
        $this->assertEquals('Double ID', $column->getComment());
    }
}
