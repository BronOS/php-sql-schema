<?php

namespace BronOS\PhpSqlSchema\Tests\Column\Numeric;


use BronOS\PhpSqlSchema\Column\Numeric\BitColumn;
use PHPUnit\Framework\TestCase;

class BitColumnTest extends TestCase
{
    public function test__construct()
    {
        $column = new BitColumn(
            'test',
            2,
            true,
            null,
            "Bit test"
        );

        $this->assertEquals('BIT', $column->getType());
        $this->assertEquals('test', $column->getName());
        $this->assertEquals(2, $column->getSize());
        $this->assertTrue($column->isNullable());
        $this->assertFalse($column->isDefaultNull());
        $this->assertNull($column->getDefault());
        $this->assertEquals('Bit test', $column->getComment());
    }
}
