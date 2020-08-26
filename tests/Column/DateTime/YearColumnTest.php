<?php

namespace BronOS\PhpSqlSchema\Tests\Column\DateTime;


use BronOS\PhpSqlSchema\Column\DateTime\YearColumn;
use PHPUnit\Framework\TestCase;

class YearColumnTest extends TestCase
{
    public function test__construct()
    {
        $column = new YearColumn(
            'dt',
            true,
            true,
            '2020',
            null,
        );

        $this->assertEquals('YEAR', $column->getType());
        $this->assertEquals('dt', $column->getName());
        $this->assertTrue($column->isNullable());
        $this->assertFalse($column->isDefaultNull());
        $this->assertEquals('2020', $column->getDefault());
        $this->assertNull($column->getComment());
    }
}
