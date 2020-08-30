<?php

namespace BronOS\PhpSqlSchema\Tests\Column\String;


use BronOS\PhpSqlSchema\Column\String\EnumColumn;
use BronOS\PhpSqlSchema\Column\String\SetColumn;
use BronOS\PhpSqlSchema\Exception\ColumnDeclarationException;
use PHPUnit\Framework\TestCase;

class SetColumnTest extends TestCase
{
    public function test__construct()
    {
        $column = new SetColumn(
            'test',
            ['a', 'b', 'c'],
            true,
            'a, c',
            'cp1251',
            'cp1251_ukrainian_ci',
            'Test enum'
        );

        $this->assertEquals('SET', $column->getType());
        $this->assertEquals('test', $column->getName());
        $this->assertEquals(['a', 'b', 'c'], $column->getOptions());
        $this->assertTrue($column->isNullable());
        $this->assertFalse($column->isDefaultNull());
        $this->assertEquals(['a', 'c'], $column->getDefaultList());
        $this->assertEquals('cp1251', $column->getCharset());
        $this->assertEquals('cp1251_ukrainian_ci', $column->getCollate());
        $this->assertEquals('Test enum', $column->getComment());
    }
}
