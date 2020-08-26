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
            '0',
            'Test bool'
        );

        $this->assertEquals('BOOL', $column->getType());
        $this->assertEquals('test', $column->getName());
        $this->assertTrue($column->isNullable());
        $this->assertEquals('0', $column->getDefault());
        $this->assertEquals('Test bool', $column->getComment());
    }

    public function testNullable()
    {
        $column = new BoolColumn(
            'test',
            true,
            BoolColumn::NULL_KEYWORD,
            'Test bool'
        );

        $this->assertEquals('BOOL', $column->getType());
        $this->assertEquals('test', $column->getName());
        $this->assertTrue($column->isNullable());
        $this->assertTrue($column->isDefaultNull());
        $this->assertEquals(BoolColumn::NULL_KEYWORD, $column->getDefault());
        $this->assertEquals('Test bool', $column->getComment());
    }
}
