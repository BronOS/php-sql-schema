<?php

namespace BronOS\PhpSqlSchema\Tests\Column\Numeric;


use BronOS\PhpSqlSchema\Column\Numeric\FloatColumn;
use PHPUnit\Framework\TestCase;

class FloatColumnTest extends TestCase
{
    public function test__construct()
    {
        $column = new FloatColumn(
            'id',
            4,
            3,
            true,
            false,
            '10.5',
            false,
            "Float ID"
        );

        $this->assertEquals('FLOAT', $column->getType());
        $this->assertEquals('id', $column->getName());
        $this->assertEquals(4, $column->getPrecision());
        $this->assertEquals(3, $column->getScale());
        $this->assertTrue($column->isUnsigned());
        $this->assertFalse($column->isNullable());
        $this->assertEquals('10.5', $column->getDefault());
        $this->assertFalse($column->isZerofill());
        $this->assertEquals('Float ID', $column->getComment());
    }

    public function testNullableSize()
    {
        $column = new FloatColumn(
            'id',
            null,
            null,
            true,
            false,
            '10.5',
            false,
            "Float ID"
        );

        $this->assertEquals('FLOAT', $column->getType());
        $this->assertEquals('id', $column->getName());
        $this->assertNull($column->getPrecision());
        $this->assertNull($column->getScale());
        $this->assertTrue($column->isUnsigned());
        $this->assertFalse($column->isNullable());
        $this->assertEquals('10.5', $column->getDefault());
        $this->assertFalse($column->isZerofill());
        $this->assertEquals('Float ID', $column->getComment());
    }
}
