<?php

namespace BronOS\PhpSqlSchema\Tests\Column\Numeric;


use BronOS\PhpSqlSchema\Column\Numeric\TinyIntColumn;
use PHPUnit\Framework\TestCase;

class TinyIntColumnTest extends TestCase
{

    public function test__construct()
    {
        $int = new TinyIntColumn(
            'id',
            1,
            true,
            true,
            false,
            null,
            false,
            "Tinyint ID"
        );

        $this->assertEquals('TINYINT', $int->getType());
        $this->assertEquals('id', $int->getName());
        $this->assertEquals(1, $int->getSize());
        $this->assertTrue($int->isUnsigned());
        $this->assertTrue($int->isAutoincrement());
        $this->assertFalse($int->isNullable());
        $this->assertNull($int->getDefault());
        $this->assertFalse($int->isZerofill());
        $this->assertEquals('Tinyint ID', $int->getComment());
    }
}
