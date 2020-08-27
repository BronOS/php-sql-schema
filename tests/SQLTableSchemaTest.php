<?php

namespace BronOS\PhpSqlSchema\Tests;


use BronOS\PhpSqlSchema\Column\Numeric\IntColumn;
use BronOS\PhpSqlSchema\Column\Numeric\IntColumnInterface;
use BronOS\PhpSqlSchema\Column\String\VarCharColumn;
use BronOS\PhpSqlSchema\Index\IndexInterface;
use BronOS\PhpSqlSchema\Index\PrimaryKey;
use BronOS\PhpSqlSchema\Index\UniqueKey;
use BronOS\PhpSqlSchema\SQLTableSchema;
use PHPUnit\Framework\TestCase;

class SQLTableSchemaTest extends TestCase
{
    public function test__construct()
    {
        $table = new SQLTableSchema('users', [
            new IntColumn('id', 11, true, true),
            new VarCharColumn('nickname', 10),
        ], [
            new PrimaryKey(['id']),
            new UniqueKey(['nickname']),
        ]);

        $this->assertEquals('users', $table->getName());
        $this->assertEquals(2, count($table->getColumns()));
        $this->assertEquals(2, count($table->getIndexes()));

        $idColumn = $table->getColumn('id');

        $this->assertInstanceOf(IntColumnInterface::class, $idColumn);
        $this->assertEquals('id', $idColumn->getName());

        $unqIndex = $table->getIndex('unique_key_nickname_idx');
        $this->assertInstanceOf(IndexInterface::class, $unqIndex);
        $this->assertEquals('nickname', $unqIndex->getFields()[0]);
    }
}
