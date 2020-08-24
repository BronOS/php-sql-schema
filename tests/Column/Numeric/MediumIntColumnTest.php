<?php

namespace BronOS\PhpSqlSchema\Tests\Column\Numeric;


use BronOS\PhpSqlSchema\Column\Numeric\MediumIntColumn;
use PHPUnit\Framework\TestCase;

class MediumIntColumnTest extends TestCase
{

    public function test__construct()
    {
        $int = new MediumIntColumn(
            'id',
            11,
            false,
            false,
            false,
            150,
            true,
            "Medium ID"
        );

        $this->assertEquals('MEDIUMINT', $int->getType());
        $this->assertEquals('id', $int->getName());
        $this->assertEquals(11, $int->getSize());
        $this->assertFalse($int->isUnsigned());
        $this->assertFalse($int->isAutoincrement());
        $this->assertFalse($int->isNullable());
        $this->assertEquals(150, $int->getDefault());
        $this->assertTrue($int->isZerofill());
        $this->assertEquals('Medium ID', $int->getComment());
    }
}
