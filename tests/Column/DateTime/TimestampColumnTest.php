<?php

namespace BronOS\PhpSqlSchema\Tests\Column\DateTime;


use BronOS\PhpSqlSchema\Column\DateTime\TimestampColumn;
use PHPUnit\Framework\TestCase;

class TimestampColumnTest extends TestCase
{
    public function test__construct()
    {
        $column = new TimestampColumn(
            'dt',
            0,
            false,
            true,
            true,
            '2020-08-26 22:10:01',
            null
        );

        $this->assertEquals('TIMESTAMP', $column->getType());
        $this->assertEquals('dt', $column->getName());
        $this->assertFalse($column->isNullable());
        $this->assertTrue($column->isOnUpdateTimestamp());
        $this->assertTrue($column->isDefaultTimestamp());
        $this->assertFalse($column->isDefaultNull());
        $this->assertEquals('2020-08-26 22:10:01', $column->getDefault());
        $this->assertNull($column->getComment());
    }
}
