<?php

namespace BronOS\PhpSqlSchema\Tests\Column\String;


use BronOS\PhpSqlSchema\Column\String\MediumBlobColumn;
use PHPUnit\Framework\TestCase;

class MediumBlobColumnTest extends TestCase
{
    public function test__construct()
    {
        $column = new MediumBlobColumn(
            'test',
            true,
            'cp1251',
            'cp1251_ukrainian_ci',
            'Test mediumblob'
        );

        $this->assertEquals('MEDIUMBLOB', $column->getType());
        $this->assertEquals('test', $column->getName());
        $this->assertTrue($column->isNullable());
        $this->assertEquals('cp1251', $column->getCharset());
        $this->assertEquals('cp1251_ukrainian_ci', $column->getCollate());
        $this->assertEquals('Test mediumblob', $column->getComment());
    }
}
