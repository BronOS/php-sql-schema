<?php

namespace BronOS\PhpSqlSchema\Tests\Column\String;


use BronOS\PhpSqlSchema\Column\String\LongTextColumn;
use PHPUnit\Framework\TestCase;

class LongTextColumnTest extends TestCase
{
    public function test__construct()
    {
        $column = new LongTextColumn(
            'test',
            true,
            true,
            false,
            'cp1251',
            'cp1251_ukrainian_ci',
            'Test longtext'
        );

        $this->assertEquals('LONGTEXT', $column->getType());
        $this->assertEquals('test', $column->getName());
        $this->assertTrue($column->isBinary());
        $this->assertTrue($column->isNullable());
        $this->assertFalse($column->isDefaultNull());
        $this->assertNull($column->getDefault());
        $this->assertEquals('cp1251', $column->getCharset());
        $this->assertEquals('cp1251_ukrainian_ci', $column->getCollate());
        $this->assertEquals('Test longtext', $column->getComment());
    }
}
