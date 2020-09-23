<?php

namespace BronOS\PhpSqlSchema\Tests;


use BronOS\PhpSqlSchema\Column\Numeric\IntColumn;
use BronOS\PhpSqlSchema\Column\Numeric\IntColumnInterface;
use BronOS\PhpSqlSchema\Column\String\VarCharColumn;
use BronOS\PhpSqlSchema\Index\IndexInterface;
use BronOS\PhpSqlSchema\Index\PrimaryKey;
use BronOS\PhpSqlSchema\Index\UniqueKey;
use BronOS\PhpSqlSchema\Relation\ForeignKey;
use BronOS\PhpSqlSchema\SQLDatabaseSchema;
use BronOS\PhpSqlSchema\SQLTableSchema;
use PHPUnit\Framework\TestCase;

class SQLDatabaseSchemaTest extends TestCase
{
    public function test__construct()
    {
        $db = new SQLDatabaseSchema('db1', [
            'users' => new SQLTableSchema('users', [
                new IntColumn('id', 11, true, true),
                new IntColumn('blog_id', 11, true),
                new VarCharColumn('nickname', 10),
            ], [
                new PrimaryKey(['id']),
                new UniqueKey(['nickname']),
            ], [
                new ForeignKey('blog_id', 'post', 'id'),
            ]),
        ]);

        $table = $db->getTable('users');

        $this->assertEquals('users', $table->getName());
        $this->assertEquals(3, count($table->getColumns()));
        $this->assertEquals(2, count($table->getIndexes()));
        $this->assertEquals(1, count($table->getRelations()));

        $idColumn = $table->getColumn('id');

        $this->assertInstanceOf(IntColumnInterface::class, $idColumn);
        $this->assertEquals('id', $idColumn->getName());

        $unqIndex = $table->getIndex('unique_key_nickname_idx');
        $this->assertInstanceOf(IndexInterface::class, $unqIndex);
        $this->assertEquals('nickname', $unqIndex->getFields()[0]);
    }
}
