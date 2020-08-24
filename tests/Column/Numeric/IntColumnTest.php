<?php

namespace BronOS\PhpSqlSchema\Tests\Column\Numeric;


use BronOS\PhpSqlSchema\Column\Numeric\IntColumn;
use BronOS\PhpSqlSchema\Exception\SQLColumnDeclarationException;
use PHPUnit\Framework\TestCase;

class IntColumnTest extends TestCase
{

    public function test__construct()
    {
        $int = new IntColumn(
            'id',
            11,
            true,
            true,
            false,
            null,
            false,
            "Primary ID"
        );

        $this->assertEquals('INT', $int->getType());
        $this->assertEquals('id', $int->getName());
        $this->assertEquals(11, $int->getSize());
        $this->assertTrue($int->isUnsigned());
        $this->assertTrue($int->isAutoincrement());
        $this->assertFalse($int->isNullable());
        $this->assertNull($int->getDefault());
        $this->assertFalse($int->isZerofill());
        $this->assertEquals('Primary ID', $int->getComment());
    }

    public function testOutOfRangeMin()
    {
        $this->expectException(SQLColumnDeclarationException::class);
        new IntColumn('id', 0);
    }

    public function testOutOfRangeMax()
    {
        $this->expectException(SQLColumnDeclarationException::class);
        new IntColumn('id', 256);
    }
}
