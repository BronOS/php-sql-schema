<?php

namespace BronOS\PhpSqlSchema\Tests\Column\String;


use BronOS\PhpSqlSchema\Column\String\VarCharColumn;
use PHPUnit\Framework\TestCase;

class VarCharColumnTest extends TestCase
{
    public function test__construct()
    {
        $column = new VarCharColumn(
            'test',
            20,
            true,
            'Test txt',
            'cp1251',
            'cp1251_ukrainian_ci',
            'Test char'
        );

        $this->assertEquals('VARCHAR', $column->getType());
        $this->assertEquals('test', $column->getName());
        $this->assertEquals(20, $column->getSize());
        $this->assertTrue($column->isNullable());
        $this->assertEquals('Test txt', $column->getDefault());
        $this->assertEquals('cp1251', $column->getCharset());
        $this->assertEquals('cp1251_ukrainian_ci', $column->getCollate());
        $this->assertEquals('Test char', $column->getComment());
    }
}
