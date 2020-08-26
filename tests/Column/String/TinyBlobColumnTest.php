<?php

namespace BronOS\PhpSqlSchema\Tests\Column\String;


use BronOS\PhpSqlSchema\Column\String\TinyBlobColumn;
use PHPUnit\Framework\TestCase;

class TinyBlobColumnTest extends TestCase
{
    public function test__construct()
    {
        $column = new TinyBlobColumn(
            'test',
            true,
            'cp1251',
            'cp1251_ukrainian_ci',
            'Test tinyblob'
        );

        $this->assertEquals('TINYBLOB', $column->getType());
        $this->assertEquals('test', $column->getName());
        $this->assertTrue($column->isNullable());
        $this->assertEquals('cp1251', $column->getCharset());
        $this->assertEquals('cp1251_ukrainian_ci', $column->getCollate());
        $this->assertEquals('Test tinyblob', $column->getComment());
    }
}
