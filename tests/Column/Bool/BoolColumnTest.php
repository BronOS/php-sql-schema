<?php

namespace BronOS\PhpSqlSchema\Tests\Column\Bool;


use BronOS\PhpSqlSchema\Column\Bool\BoolColumn;
use PHPUnit\Framework\TestCase;

class BoolColumnTest extends TestCase
{
    public function test__construct()
    {
        $int = new BoolColumn(
            'test',
            true,
            false,
            'Test bool'
        );

        $this->assertEquals('BOOL', $int->getType());
        $this->assertEquals('test', $int->getName());
        $this->assertTrue($int->isNullable());
        $this->assertEquals('0', $int->getDefault());
        $this->assertEquals('Test bool', $int->getComment());
    }
}
