<?php

namespace BronOS\PhpSqlSchema\Tests\Column\Numeric;


use BronOS\PhpSqlSchema\Column\Numeric\DecimalColumn;
use PHPUnit\Framework\TestCase;

class DecimalColumnTest extends TestCase
{
    public function test__construct()
    {
        $column = new DecimalColumn(
            'id',
            4,
            3,
            true,
            false,
            10.5,
            false,
            "Decimal ID"
        );

        $this->assertEquals('DECIMAL', $column->getType());
        $this->assertEquals('id', $column->getName());
        $this->assertEquals(4, $column->getPrecision());
        $this->assertEquals(3, $column->getScale());
        $this->assertTrue($column->isUnsigned());
        $this->assertFalse($column->isNullable());
        $this->assertEquals('10.5', $column->getDefault());
        $this->assertFalse($column->isZerofill());
        $this->assertEquals('Decimal ID', $column->getComment());
    }
}
