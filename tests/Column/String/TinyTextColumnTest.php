<?php

namespace BronOS\PhpSqlSchema\Tests\Column\String;


use BronOS\PhpSqlSchema\Column\String\TinyTextColumn;
use PHPUnit\Framework\TestCase;

class TinyTextColumnTest extends TestCase
{
    public function test__construct()
    {
        $column = new TinyTextColumn(
            'test',
            true,
            true,
            'cp1251',
            'cp1251_ukrainian_ci',
            'Test tinytext'
        );

        $this->assertEquals('TINYTEXT', $column->getType());
        $this->assertEquals('test', $column->getName());
        $this->assertTrue($column->isBinary());
        $this->assertTrue($column->isNullable());
        $this->assertEquals('cp1251', $column->getCharset());
        $this->assertEquals('cp1251_ukrainian_ci', $column->getCollate());
        $this->assertEquals('Test tinytext', $column->getComment());
    }
}
