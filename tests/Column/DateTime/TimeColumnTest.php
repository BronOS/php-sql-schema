<?php

namespace BronOS\PhpSqlSchema\Tests\Column\DateTime;


use BronOS\PhpSqlSchema\Column\DateTime\TimeColumn;
use PHPUnit\Framework\TestCase;

class TimeColumnTest extends TestCase
{
    public function test__construct()
    {
        $column = new TimeColumn(
            'dt',
            0,
            true,
            true,
            '13:08:26',
            null,
        );

        $this->assertEquals('TIME', $column->getType());
        $this->assertEquals('dt', $column->getName());
        $this->assertTrue($column->isNullable());
        $this->assertFalse($column->isDefaultNull());
        $this->assertEquals('13:08:26', $column->getDefault());
        $this->assertNull($column->getComment());
    }
}
