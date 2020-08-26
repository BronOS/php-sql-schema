<?php

namespace BronOS\PhpSqlSchema\Tests\Column\Numeric;


use BronOS\PhpSqlSchema\Column\Numeric\TinyIntColumn;
use PHPUnit\Framework\TestCase;

class TinyIntColumnTest extends TestCase
{

    public function test__construct()
    {
        $column = new TinyIntColumn(
            'id',
            1,
            true,
            true,
            false,
            null,
            false,
            "Tinyint ID"
        );

        $this->assertEquals('TINYINT', $column->getType());
        $this->assertEquals('id', $column->getName());
        $this->assertEquals(1, $column->getSize());
        $this->assertTrue($column->isUnsigned());
        $this->assertTrue($column->isAutoincrement());
        $this->assertFalse($column->isNullable());
        $this->assertNull($column->getDefault());
        $this->assertFalse($column->isZerofill());
        $this->assertEquals('Tinyint ID', $column->getComment());
    }
}
