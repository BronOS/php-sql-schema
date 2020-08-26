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
            'cp1251',
            'cp1251_ukrainian_ci',
            'Test longblob'
        );

        $this->assertEquals('LONGBLOB', $column->getType());
        $this->assertEquals('test', $column->getName());
        $this->assertTrue($column->isNullable());
        $this->assertEquals('cp1251', $column->getCharset());
        $this->assertEquals('cp1251_ukrainian_ci', $column->getCollate());
        $this->assertEquals('Test longblob', $column->getComment());
    }
}
