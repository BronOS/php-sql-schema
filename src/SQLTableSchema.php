<?php

/**
 * Php Sql Schema
 *
 * MIT License
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * @package   bronos\php-sql-schema
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2020
 * @license   https://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace BronOS\PhpSqlSchema;


use BronOS\PhpSqlSchema\Column\ColumnInterface;
use BronOS\PhpSqlSchema\Exception\ColumnNotFoundException;
use BronOS\PhpSqlSchema\Exception\DuplicateColumnException;
use BronOS\PhpSqlSchema\Exception\DuplicateIndexException;
use BronOS\PhpSqlSchema\Exception\DuplicateRelationException;
use BronOS\PhpSqlSchema\Exception\IndexNotFoundException;
use BronOS\PhpSqlSchema\Exception\RelationNotFoundException;
use BronOS\PhpSqlSchema\Exception\SQLTableSchemaDeclarationException;
use BronOS\PhpSqlSchema\Index\IndexInterface;
use BronOS\PhpSqlSchema\Relation\ForeignKeyInterface;

/**
 * PHP representation of SQL table schema.
 *
 * @package   bronos\php-sql-schema
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2020
 * @license   https://opensource.org/licenses/MIT
 */
class SQLTableSchema implements SQLTableSchemaInterface
{
    private string $name;
    private array $columns;
    private array $indexes;
    private array $relations;
    private string $engine;
    private string $defaultCharset;
    private ?string $collate;

    /**
     * SQLTableSchema constructor.
     *
     * @param string      $name
     * @param array       $columns
     * @param array       $indexes
     * @param array       $relations
     * @param string      $engine
     * @param string      $defaultCharset
     * @param string|null $collate
     *
     * @throws DuplicateColumnException
     * @throws DuplicateIndexException
     * @throws DuplicateRelationException
     * @throws SQLTableSchemaDeclarationException
     */
    public function __construct(
        string $name,
        array $columns = [],
        array $indexes = [],
        array $relations = [],
        string $engine = 'InnoDB',
        string $defaultCharset = 'utf8mb4',
        ?string $collate = null
    ) {
        $this->setName($name);

        try {
            $this->setColumns(...$columns);
        } catch (DuplicateColumnException $e) {
            throw $e;
        } catch (\Throwable $e) {
            throw new SQLTableSchemaDeclarationException('Incorrect column type', $e->getCode(), $e);
        }

        try {
            $this->setIndexes(...$indexes);
        } catch (DuplicateIndexException $e) {
            throw $e;
        } catch (\Throwable $e) {
            throw new SQLTableSchemaDeclarationException('Incorrect index type', $e->getCode(), $e);
        }

        try {
            $this->setRelations(...$relations);
        } catch (DuplicateRelationException $e) {
            throw $e;
        } catch (\Throwable $e) {
            throw new SQLTableSchemaDeclarationException('Incorrect relation type', $e->getCode(), $e);
        }

        $this->engine = $engine;
        $this->defaultCharset = $defaultCharset;
        $this->collate = $collate;
    }

    /**
     * @param string $name
     *
     * @throws SQLTableSchemaDeclarationException
     */
    private function setName(string $name): void
    {
        if (strlen($name) == 0) {
            throw new SQLTableSchemaDeclarationException('Empty table name');
        }

        $this->name = $name;
    }

    /**
     * @param ColumnInterface[] $columns
     *
     * @throws DuplicateColumnException
     */
    private function setColumns(ColumnInterface ...$columns): void
    {
        foreach ($columns as $column) {
            if (isset($this->columns[$column->getName()])) {
                throw new DuplicateColumnException('Duplicate column');
            }

            $this->columns[$column->getName()] = $column;
        }
    }

    /**
     * @param IndexInterface[] $indexes
     *
     * @throws DuplicateIndexException
     */
    private function setIndexes(IndexInterface ...$indexes): void
    {
        foreach ($indexes as $index) {
            if (isset($this->indexes[$index->getName()])) {
                throw new DuplicateIndexException('Duplicate index');
            }

            $this->indexes[$index->getName()] = $index;
        }
    }

    /**
     * @param ForeignKeyInterface[] $relations
     *
     * @throws DuplicateRelationException
     */
    private function setRelations(ForeignKeyInterface ...$relations): void
    {
        foreach ($relations as $relation) {
            if (isset($this->relations[$relation->getName()])) {
                throw new DuplicateRelationException('Duplicate relation');
            }

            $this->relations[$relation->getName()] = $relation;
        }
    }

    /**
     * Returns name of table.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Returns key~>value map of table columns, where key is a column name and value is a column object.
     *
     * @return ColumnInterface[]
     */
    public function getColumns(): array
    {
        return $this->columns;
    }

    /**
     * Returns column by name if exists or throws ColumnNotFoundException otherwise.
     *
     * @param string $name
     *
     * @return ColumnInterface
     *
     * @throws ColumnNotFoundException
     */
    public function getColumn(string $name): ColumnInterface
    {
        if (!isset($this->columns[$name])) {
            throw new ColumnNotFoundException('Column not found');
        }

        return $this->columns[$name];
    }

    /**
     * Returns key~>value map of of table indexes, where key is a index name and value is a index object.
     *
     * @return IndexInterface[]
     */
    public function getIndexes(): array
    {
        return $this->indexes;
    }

    /**
     * Returns index by name if exists or throws IndexNotFoundException otherwise.
     *
     * @param string $name
     *
     * @return IndexInterface
     *
     * @throws IndexNotFoundException
     */
    public function getIndex(string $name): IndexInterface
    {
        if (!isset($this->indexes[$name])) {
            throw new IndexNotFoundException('Index not found');
        }

        return $this->indexes[$name];
    }

    /**
     * Returns key~>value map of of table relations, where key is a foreign key name and value is a foreign key object.
     *
     * @return ForeignKeyInterface[]
     */
    public function getRelations(): array
    {
        return $this->relations;
    }

    /**
     * Returns foreign key by name if exists or throws RelationNotFoundException otherwise.
     *
     * @param string $name
     *
     * @return ForeignKeyInterface
     *
     * @throws RelationNotFoundException
     */
    public function getRelation(string $name): ForeignKeyInterface
    {
        if (!isset($this->relations[$name])) {
            throw new RelationNotFoundException('Relation not found');
        }

        return $this->relations[$name];
    }

    /**
     * Returns engine type.
     *
     * @return string
     */
    public function getEngine(): string
    {
        return $this->engine;
    }

    /**
     * Returns default charset.
     *
     * @return string
     */
    public function getDefaultCharset(): string
    {
        return $this->defaultCharset;
    }

    /**
     * Returns collate of the table if set or null otherwise.
     *
     * @return string|null
     */
    public function getCollate(): ?string
    {
        return $this->collate;
    }
}