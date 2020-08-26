<?php

namespace BronOS\PhpSqlSchema\Tests\Column\Bool;


use BronOS\PhpSqlSchema\Column\Bool\BoolColumn;
use PHPUnit\Framework\TestCase;

class BoolColumnTest extends TestCase
{
    public function test__construct()
    {
        $column = new BoolColumn(
            'test',
            true,
            false,
            'Test bool'
        );

        $this->assertEquals('BOOL', $column->getType());
        $this->assertEquals('test', $column->getName());
        $this->assertTrue($column->isNullable());
        $this->assertEquals('0', $column->getDefault());
        $this->assertEquals('Test bool', $column->getComment());
    }
}
