<?php

namespace BronOS\PhpSqlSchema\Tests\Column\Numeric;


use BronOS\PhpSqlSchema\Column\Numeric\BigIntColumn;
use PHPUnit\Framework\TestCase;

class BigIntColumnTest extends TestCase
{

    public function test__construct()
    {
        $int = new BigIntColumn(
            'id',
            11,
            false,
            false,
            false,
            9223372036854775807,
            true,
            "Big ID"
        );

        $this->assertEquals('BIGINT', $int->getType());
        $this->assertEquals('id', $int->getName());
        $this->assertEquals(11, $int->getSize());
        $this->assertFalse($int->isUnsigned());
        $this->assertFalse($int->isAutoincrement());
        $this->assertFalse($int->isNullable());
        $this->assertEquals(9223372036854775807, $int->getDefault());
        $this->assertTrue($int->isZerofill());
        $this->assertEquals('Big ID', $int->getComment());
    }
}
