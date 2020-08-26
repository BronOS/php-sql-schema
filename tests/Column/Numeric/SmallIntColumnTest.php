<?php

namespace BronOS\PhpSqlSchema\Tests\Column\Numeric;


use BronOS\PhpSqlSchema\Column\Numeric\SmallIntColumn;
use PHPUnit\Framework\TestCase;

class SmallIntColumnTest extends TestCase
{

    public function test__construct()
    {
        $column = new SmallIntColumn(
            'id',
            11,
            true,
            true,
            false,
            '15',
            false,
            "Small ID"
        );

        $this->assertEquals('SMALLINT', $column->getType());
        $this->assertEquals('id', $column->getName());
        $this->assertEquals(11, $column->getSize());
        $this->assertTrue($column->isUnsigned());
        $this->assertTrue($column->isAutoincrement());
        $this->assertFalse($column->isNullable());
        $this->assertEquals('15', $column->getDefault());
        $this->assertFalse($column->isZerofill());
        $this->assertEquals('Small ID', $column->getComment());
    }
}
