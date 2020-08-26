<?php

namespace BronOS\PhpSqlSchema\Tests\Index;


use BronOS\PhpSqlSchema\Index\UniqueKey;
use PHPUnit\Framework\TestCase;

class UniqueKeyTest extends TestCase
{
    public function test__construct()
    {
        $index = new UniqueKey(
            ['test1', 'test2'],
            't12',
            22
        );

        $this->assertEquals('UNIQUE KEY', $index->getType());
        $this->assertEquals(['test1', 'test2'], $index->getFields());
        $this->assertEquals('t12', $index->getName());
        $this->assertEquals(22, $index->getSize());
    }
}
