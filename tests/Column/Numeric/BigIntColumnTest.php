<?php

namespace BronOS\PhpSqlSchema\Tests\Column\Numeric;


use BronOS\PhpSqlSchema\Column\Numeric\BigIntColumn;
use PHPUnit\Framework\TestCase;

class BigIntColumnTest extends TestCase
{

    public function test__construct()
    {
        $column = new BigIntColumn(
            'id',
            11,
            false,
            false,
            false,
            '9223372036854775807',
            true,
            "Big ID"
        );

        $this->assertEquals('BIGINT', $column->getType());
        $this->assertEquals('id', $column->getName());
        $this->assertEquals(11, $column->getSize());
        $this->assertFalse($column->isUnsigned());
        $this->assertFalse($column->isAutoincrement());
        $this->assertFalse($column->isNullable());
        $this->assertEquals('9223372036854775807', $column->getDefault());
        $this->assertTrue($column->isZerofill());
        $this->assertEquals('Big ID', $column->getComment());
    }
}
