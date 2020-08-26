<?php

namespace BronOS\PhpSqlSchema\Tests\Column\DateTime;


use BronOS\PhpSqlSchema\Column\DateTime\DateTimeColumn;
use PHPUnit\Framework\TestCase;

class DateTimeColumnTest extends TestCase
{
    public function test__construct()
    {
        $column = new DateTimeColumn(
            'dt',
            true,
            true,
            true,
            '2020-08-26 22:10:01',
            null,
        );

        $this->assertEquals('DATETIME', $column->getType());
        $this->assertEquals('dt', $column->getName());
        $this->assertTrue($column->isNullable());
        $this->assertTrue($column->isOnUpdateTimestamp());
        $this->assertTrue($column->isDefaultTimestamp());
        $this->assertFalse($column->isDefaultNull());
        $this->assertEquals('2020-08-26 22:10:01', $column->getDefault());
        $this->assertNull($column->getComment());
    }
}
