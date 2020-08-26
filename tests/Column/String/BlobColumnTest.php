<?php

namespace BronOS\PhpSqlSchema\Tests\Column\String;


use BronOS\PhpSqlSchema\Column\String\BlobColumn;
use PHPUnit\Framework\TestCase;

class BlobColumnTest extends TestCase
{
    public function test__construct()
    {
        $column = new BlobColumn(
            'test',
            true,
            true,
            'cp1251',
            'cp1251_ukrainian_ci',
            'Test blob'
        );

        $this->assertEquals('BLOB', $column->getType());
        $this->assertEquals('test', $column->getName());
        $this->assertTrue($column->isNullable());
        $this->assertTrue($column->isDefaultNull());
        $this->assertEquals('cp1251', $column->getCharset());
        $this->assertEquals('cp1251_ukrainian_ci', $column->getCollate());
        $this->assertEquals('Test blob', $column->getComment());
    }
}
