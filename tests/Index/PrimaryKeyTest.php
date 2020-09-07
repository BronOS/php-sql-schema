<?php

namespace BronOS\PhpSqlSchema\Tests\Index;


use BronOS\PhpSqlSchema\Index\PrimaryKey;
use PHPUnit\Framework\TestCase;

class PrimaryKeyTest extends TestCase
{
    public function test__construct()
    {
        $index = new PrimaryKey(
            ['test1', 'test2'],
            't12'
        );

        $this->assertEquals('PRIMARY KEY', $index->getType());
        $this->assertEquals(['test1', 'test2'], $index->getFields());
        $this->assertEquals('t12', $index->getName());
    }
}
