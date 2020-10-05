<?php

namespace BronOS\PhpSqlSchema\Tests\Column\DateTime;


use BronOS\PhpSqlSchema\Column\DateTime\DateColumn;
use PHPUnit\Framework\TestCase;

class DateColumnTest extends TestCase
{
    public function test__construct()
    {
        $column = new DateColumn(
            'dt',
            0,
            true,
            true,
            '2020-08-26',
            null,
        );

        $this->assertEquals('DATE', $column->getType());
        $this->assertEquals('dt', $column->getName());
        $this->assertTrue($column->isNullable());
        $this->assertFalse($column->isDefaultNull());
        $this->assertEquals('2020-08-26', $column->getDefault());
        $this->assertNull($column->getComment());
    }
}
