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


use BronOS\PhpSqlSchema\Exception\TableNotFoundException;

/**
 * PHP representation of SQL database schema.
 *
 * @package   bronos\php-sql-schema
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2020
 * @license   https://opensource.org/licenses/MIT
 */
interface SQLDatabaseSchemaInterface
{
    /**
     * Returns database name.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Returns key~>value map of tables, where key is a table name and value is a sql table schema object.
     *
     * @return SQLTableSchemaInterface[]
     */
    public function getTables(): array;

    /**
     * Returns table by name if exists or throws TableNotFoundException otherwise.
     *
     * @param string $name
     *
     * @return SQLTableSchemaInterface
     *
     * @throws TableNotFoundException
     */
    public function getTable(string $name): SQLTableSchemaInterface;

    /**
     * Returns default engine name.
     *
     * @return string|null
     */
    public function getDefaultEngine(): ?string;

    /**
     * Returns default charset.
     *
     * @return string|null
     */
    public function getDefaultCharset(): ?string;

    /**
     * Returns default collation
     *
     * @return string|null
     */
    public function getDefaultCollation(): ?string;
}