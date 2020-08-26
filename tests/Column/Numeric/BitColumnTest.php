<?php

namespace BronOS\PhpSqlSchema\Tests\Column\Numeric;


use BronOS\PhpSqlSchema\Column\Numeric\BitColumn;
use BronOS\PhpSqlSchema\Column\Numeric\IntColumn;
use BronOS\PhpSqlSchema\Exception\SQLColumnDeclarationException;
use PHPUnit\Framework\TestCase;

class BitColumnTest extends TestCase
{
    public function test__construct()
    {
        $int = new BitColumn(
            'test',
            2,
            true,
            null,
            "Bit test"
        );

        $this->assertEquals('BIT', $int->getType());
        $this->assertEquals('test', $int->getName());
        $this->assertEquals(2, $int->getSize());
        $this->assertTrue($int->isNullable());
        $this->assertNull($int->getDefault());
        $this->assertEquals('Bit test', $int->getComment());
    }
}
