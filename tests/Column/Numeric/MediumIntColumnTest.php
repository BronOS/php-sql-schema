<?php

namespace BronOS\PhpSqlSchema\Tests\Column\Numeric;


use BronOS\PhpSqlSchema\Column\Numeric\MediumIntColumn;
use PHPUnit\Framework\TestCase;

class MediumIntColumnTest extends TestCase
{

    public function test__construct()
    {
        $column = new MediumIntColumn(
            'id',
            11,
            false,
            false,
            false,
            '150',
            true,
            "Medium ID"
        );

        $this->assertEquals('MEDIUMINT', $column->getType());
        $this->assertEquals('id', $column->getName());
        $this->assertEquals(11, $column->getSize());
        $this->assertFalse($column->isUnsigned());
        $this->assertFalse($column->isAutoincrement());
        $this->assertFalse($column->isNullable());
        $this->assertEquals('150', $column->getDefault());
        $this->assertTrue($column->isZerofill());
        $this->assertEquals('Medium ID', $column->getComment());
    }
}
