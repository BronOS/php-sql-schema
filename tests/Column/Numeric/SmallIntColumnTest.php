<?php

namespace BronOS\PhpSqlSchema\Tests\Column\Numeric;


use BronOS\PhpSqlSchema\Column\Numeric\SmallIntColumn;
use PHPUnit\Framework\TestCase;

class SmallIntColumnTest extends TestCase
{

    public function test__construct()
    {
        $int = new SmallIntColumn(
            'id',
            11,
            true,
            true,
            false,
            15,
            false,
            "Small ID"
        );

        $this->assertEquals('SMALLINT', $int->getType());
        $this->assertEquals('id', $int->getName());
        $this->assertEquals(11, $int->getSize());
        $this->assertTrue($int->isUnsigned());
        $this->assertTrue($int->isAutoincrement());
        $this->assertFalse($int->isNullable());
        $this->assertEquals(15, $int->getDefault());
        $this->assertFalse($int->isZerofill());
        $this->assertEquals('Small ID', $int->getComment());
    }
}
