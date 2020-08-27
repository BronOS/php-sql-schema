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
use BronOS\PhpSqlSchema\Exception\IndexNotFoundException;
use BronOS\PhpSqlSchema\Exception\RelationNotFoundException;
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
interface SQLTableSchemaInterface
{
    /**
     * Returns name of table.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Returns key~>value map of table columns, where key is a column name and value is a column object.
     *
     * @return ColumnInterface[]
     */
    public function getColumns(): array;

    /**
     * Returns column by name if exists or throws ColumnNotFoundException otherwise.
     *
     * @param string $name
     *
     * @return ColumnInterface
     *
     * @throws ColumnNotFoundException
     */
    public function getColumn(string $name): ColumnInterface;

    /**
     * Returns key~>value map of of table indexes, where key is a index name and value is a index object.
     *
     * @return IndexInterface[]
     */
    public function getIndexes(): array;

    /**
     * Returns index by name if exists or throws IndexNotFoundException otherwise.
     *
     * @param string $name
     *
     * @return IndexInterface
     *
     * @throws IndexNotFoundException
     */
    public function getIndex(string $name): IndexInterface;

    /**
     * Returns key~>value map of of table relations, where key is a foreign key name and value is a foreign key object.
     *
     * @return ForeignKeyInterface[]
     */
    public function getRelations(): array;

    /**
     * Returns foreign key by name if exists or throws RelationNotFoundException otherwise.
     *
     * @param string $name
     *
     * @return ForeignKeyInterface
     *
     * @throws RelationNotFoundException
     */
    public function getRelation(string $name): ForeignKeyInterface;

    /**
     * Returns engine type.
     *
     * @return string
     */
    public function getEngine(): string;

    /**
     * Returns default charset.
     *
     * @return string
     */
    public function getDefaultCharset(): string;

    /**
     * Returns collate of the table if set or null otherwise.
     *
     * @return string|null
     */
    public function getCollate(): ?string;
}