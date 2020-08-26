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

namespace BronOS\PhpSqlSchema\Column\String;


/**
 * TINYTEXT SQL column representation.
 *
 * Holds a string with a maximum length of 255 characters
 *
 * A BLOB is a binary large object that can hold a variable amount of data.
 * The four BLOB types are TINYBLOB, BLOB, MEDIUMBLOB, and LONGBLOB.
 * These differ only in the maximum length of the values they can hold.
 * The four TEXT types are TINYTEXT, TEXT, MEDIUMTEXT, and LONGTEXT.
 * These correspond to the four BLOB types and have the same maximum lengths and storage requirements.
 *
 * BLOB values are treated as binary strings (byte strings).
 * They have the binary character set and collation,
 * and comparison and sorting are based on the numeric values of the bytes in column values.
 * TEXT values are treated as nonbinary strings (character strings).
 * They have a character set other than binary,
 * and values are sorted and compared based on the collation of the character set.
 *
 * If strict SQL mode is not enabled and you assign a value to a BLOB or TEXT
 * column that exceeds the column's maximum length,
 * the value is truncated to fit and a warning is generated.
 * For truncation of nonspace characters, you can cause an error to occur (rather than a warning)
 * and suppress insertion of the value by using strict SQL mode.
 *
 * Truncation of excess trailing spaces from values to be inserted into TEXT columns
 * always generates a warning, regardless of the SQL mode.
 *
 * For TEXT and BLOB columns, there is no padding on insert and no bytes are stripped on select.
 *
 * If a TEXT column is indexed, index entry comparisons are space-padded at the end.
 * This means that, if the index requires unique values,
 * duplicate-key errors will occur for values that differ only in the number of trailing spaces.
 * For example, if a table contains 'a', an attempt to store 'a ' causes a duplicate-key error.
 * This is not true for BLOB columns.
 *
 * In most respects, you can regard a BLOB column as a VARBINARY column that can be as large as you like.
 * Similarly, you can regard a TEXT column as a VARCHAR column.
 * BLOB and TEXT differ from VARBINARY and VARCHAR in the following ways:
 *  - For indexes on BLOB and TEXT columns, you must specify an index prefix length.
 *    For CHAR and VARCHAR, a prefix length is optional.
 *  - BLOB and TEXT columns cannot have DEFAULT values.
 *
 * If you use the BINARY attribute with a TEXT data type,
 * the column is assigned the binary (_bin) collation of the column character set.
 *
 * LONG and LONG VARCHAR map to the MEDIUMTEXT data type. This is a compatibility feature.
 *
 * @package   bronos\php-sql-schema
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2020
 * @license   https://opensource.org/licenses/MIT
 */
class TinyTextColumn extends AbstractTextColumn implements TinyTextColumnInterface
{
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