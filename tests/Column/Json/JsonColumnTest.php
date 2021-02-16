<?php

namespace BronOS\PhpSqlSchema\Tests\Column\Json;


use BronOS\PhpSqlSchema\Column\Json\JsonColumn;
use BronOS\PhpSqlSchema\Column\String\TextColumn;
use PHPUnit\Framework\TestCase;

class JsonColumnTest extends TestCase
{
    public function test__construct()
    {
        $column = new JsonColumn(
            'test',
            false,
            '{1,2,[3]}'
        );

        $this->assertEquals('JSON', $column->getType());
        $this->assertEquals('test', $column->getName());
        $this->assertFalse($column->isNullable());
        $this->assertFalse($column->isDefaultNull());
        $this->assertEquals('{1,2,[3]}', $column->getDefault());
    }
}
