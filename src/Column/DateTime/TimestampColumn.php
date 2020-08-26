<?php

/**
 * Php Sql Schema
 *
 * NOTICE OF LICENSE
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

namespace BronOS\PhpSqlSchema\Column\DateTime;


use BronOS\PhpSqlSchema\Exception\ColumnDeclarationException;

/**
 * TIMESTAMP SQL column representation.
 *
 * A timestamp. TIMESTAMP values are stored as the number of seconds since
 * the Unix epoch ('1970-01-01 00:00:00' UTC). Format: YYYY-MM-DD hh:mm:ss.
 * The supported range is from '1970-01-01 00:00:01' UTC to '2038-01-09 03:14:07' UTC.
 * Automatic initialization and updating to the current date and time
 * can be specified using DEFAULT CURRENT_TIMESTAMP and ON UPDATE CURRENT_TIMESTAMP in the column definition
 *
 * @package   bronos\php-sql-schema
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2020
 * @license   https://opensource.org/licenses/MIT
 */
class TimestampColumn extends AbstractDateTimeColumn implements TimestampColumnInterface
{
    /**
     * AbstractSQLColumn constructor.
     *
     * @param string $name
     * @param bool $isDefaultTimestamp
     * @param bool $isOnUpdateTimestamp
     * @param string|null $default
     * @param string|null $comment
     *
     * @throws ColumnDeclarationException
     */
    public function __construct(
        string $name,
        bool $isDefaultTimestamp = false,
        bool $isOnUpdateTimestamp = false,
        ?string $default = null,
        ?string $comment = null
    ) {
        parent::__construct($name, $isDefaultTimestamp, $isOnUpdateTimestamp, false, $default, $comment);
    }

    /**
     * Returns string representation of the SQL column type.
     *
     * @return string
     */
    public function getType(): string
    {
        return self::SQL_TYPE;
    }
}