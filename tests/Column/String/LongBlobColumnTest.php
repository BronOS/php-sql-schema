<?php

namespace BronOS\PhpSqlSchema\Tests\Column\String;


use BronOS\PhpSqlSchema\Column\String\LongBlobColumn;
use PHPUnit\Framework\TestCase;

class LongBlobColumnTest extends TestCase
{
    public function test__construct()
    {
        $column = new LongBlobColumn(
            'test',
            true,
            false,
            'cp1251',
            'cp1251_ukrainian_ci',
            'Test longblob'
        );

        $this->assertEquals('LONGBLOB', $column->getType());
        $this->assertEquals('test', $column->getName());
        $this->assertTrue($column->isNullable());
        $this->assertFalse($column->isDefaultNull());
        $this->assertNull($column->getDefault());
        $this->assertEquals('cp1251', $column->getCharset());
        $this->assertEquals('cp1251_ukrainian_ci', $column->getCollate());
        $this->assertEquals('Test longblob', $column->getComment());
    }
}
