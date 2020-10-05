<?php

namespace BronOS\PhpSqlSchema\Tests\Column\Numeric;


use BronOS\PhpSqlSchema\Column\Numeric\IntColumn;
use BronOS\PhpSqlSchema\Exception\ColumnDeclarationException;
use PHPUnit\Framework\TestCase;

class IntColumnTest extends TestCase
{

    public function test__construct()
    {
        $column = new IntColumn(
            'id',
            11,
            true,
            true,
            false,
            null,
            false,
            "Primary ID"
        );

        $this->assertEquals('INT', $column->getType());
        $this->assertEquals('id', $column->getName());
        $this->assertEquals(11, $column->getSize());
        $this->assertTrue($column->isUnsigned());
        $this->assertTrue($column->isAutoincrement());
        $this->assertFalse($column->isNullable());
        $this->assertFalse($column->isDefaultNull());
        $this->assertNull($column->getDefault());
        $this->assertFalse($column->isZerofill());
        $this->assertEquals('Primary ID', $column->getComment());
    }
}
