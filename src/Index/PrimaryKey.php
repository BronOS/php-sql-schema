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

namespace BronOS\PhpSqlSchema\Index;


use BronOS\PhpSqlSchema\Exception\DuplicateIndexFieldException;
use BronOS\PhpSqlSchema\Exception\EmptyIndexFieldListException;
use BronOS\PhpSqlSchema\Exception\InvalidIndexFieldTypeException;

/**
 * PHP representation of SQL table primary key.
 *
 * @package   bronos\php-sql-schema
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2020
 * @license   https://opensource.org/licenses/MIT
 */
class PrimaryKey extends AbstractIndex implements PrimaryKeyInterface
{
    /**
     * AbstractIndex constructor.
     *
     * @param array $fields
     *
     * @throws DuplicateIndexFieldException
     * @throws EmptyIndexFieldListException
     * @throws InvalidIndexFieldTypeException
     */
    public function __construct(array $fields)
    {
        parent::__construct($fields, self::PRIMARY_INDEX_NAME);
    }

    /**
     * Returns string representation of SQL key type.
     *
     * @return string
     */
    public function getType(): string
    {
        return self::SQL_TYPE;
    }
}