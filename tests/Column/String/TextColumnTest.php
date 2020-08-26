<?php

namespace BronOS\PhpSqlSchema\Tests\Column\String;


use BronOS\PhpSqlSchema\Column\String\TextColumn;
use PHPUnit\Framework\TestCase;

class TextColumnTest extends TestCase
{
    public function test__construct()
    {
        $column = new TextColumn(
            'test',
            true,
            true,
            false,
            'cp1251',
            'cp1251_ukrainian_ci',
            'Test text'
        );

        $this->assertEquals('TEXT', $column->getType());
        $this->assertEquals('test', $column->getName());
        $this->assertTrue($column->isBinary());
        $this->assertTrue($column->isNullable());
        $this->assertFalse($column->isDefaultNull());
        $this->assertNull($column->getDefault());
        $this->assertEquals('cp1251', $column->getCharset());
        $this->assertEquals('cp1251_ukrainian_ci', $column->getCollate());
        $this->assertEquals('Test text', $column->getComment());
    }
}
