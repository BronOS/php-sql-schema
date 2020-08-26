<?php

namespace BronOS\PhpSqlSchema\Tests\Column\String;


use BronOS\PhpSqlSchema\Column\String\EnumColumn;
use BronOS\PhpSqlSchema\Exception\ColumnDeclarationException;
use PHPUnit\Framework\TestCase;

class EnumColumnTest extends TestCase
{
    public function test__construct()
    {
        $column = new EnumColumn(
            'test',
            ['a', 'b', 'c'],
            true,
            EnumColumn::NULL_KEYWORD,
            'cp1251',
            'cp1251_ukrainian_ci',
            'Test enum'
        );

        $this->assertEquals('ENUM', $column->getType());
        $this->assertEquals('test', $column->getName());
        $this->assertEquals(['a', 'b', 'c'], $column->getOptions());
        $this->assertTrue($column->isNullable());
        $this->assertTrue($column->isDefaultNull());
        $this->assertEquals($column::NULL_KEYWORD, $column->getDefault());
        $this->assertEquals('cp1251', $column->getCharset());
        $this->assertEquals('cp1251_ukrainian_ci', $column->getCollate());
        $this->assertEquals('Test enum', $column->getComment());
    }

    public function testEmptyOptions()
    {
        $this->expectException(ColumnDeclarationException::class);

        $column = new EnumColumn(
            'test',
            [],
            true,
            'b',
            'cp1251',
            'cp1251_ukrainian_ci',
            'Test enum'
        );
    }
}
