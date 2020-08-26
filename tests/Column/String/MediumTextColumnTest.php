<?php

namespace BronOS\PhpSqlSchema\Tests\Column\String;


use BronOS\PhpSqlSchema\Column\String\MediumTextColumn;
use BronOS\PhpSqlSchema\Column\String\TinyTextColumn;
use PHPUnit\Framework\TestCase;

class MediumTextColumnTest extends TestCase
{
    public function test__construct()
    {
        $column = new MediumTextColumn(
            'test',
            true,
            true,
            false,
            'cp1251',
            'cp1251_ukrainian_ci',
            'Test mediumtext'
        );

        $this->assertEquals('MEDIUMTEXT', $column->getType());
        $this->assertEquals('test', $column->getName());
        $this->assertTrue($column->isBinary());
        $this->assertTrue($column->isNullable());
        $this->assertFalse($column->isDefaultNull());
        $this->assertNull($column->getDefault());
        $this->assertEquals('cp1251', $column->getCharset());
        $this->assertEquals('cp1251_ukrainian_ci', $column->getCollate());
        $this->assertEquals('Test mediumtext', $column->getComment());
    }
}
