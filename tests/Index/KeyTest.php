<?php

namespace BronOS\PhpSqlSchema\Tests\Index;


use BronOS\PhpSqlSchema\Index\Key;
use PHPUnit\Framework\TestCase;

class KeyTest extends TestCase
{
    public function test__construct()
    {
        $index = new Key(
            ['test1', 'test2'],
            't12'
        );

        $this->assertEquals('KEY', $index->getType());
        $this->assertEquals(['test1', 'test2'], $index->getFields());
        $this->assertEquals('t12', $index->getName());
    }
}
