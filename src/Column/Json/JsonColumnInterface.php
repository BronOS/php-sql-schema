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

namespace BronOS\PhpSqlSchema\Column\Json;


use BronOS\PhpSqlSchema\Column\ColumnInterface;

/**
 * JSON SQL column representation.
 *
 * MySQL supports a native JSON data type defined by RFC 7159 that enables efficient access to data
 * in JSON (JavaScript Object Notation) documents.
 * The JSON data type provides these advantages over storing JSON-format strings in a string column:
 * - Automatic validation of JSON documents stored in JSON columns. Invalid documents produce an error.
 * - Optimized storage format. JSON documents stored in JSON columns are converted to an internal format
 *   that permits quick read access to document elements.
 *   When the server later must read a JSON value stored in this binary format,
 *   the value need not be parsed from a text representation.
 *   The binary format is structured to enable the server to look up subobjects
 *   or nested values directly by key or array index without reading all values before or after them in the document.
 *
 * @package   bronos\php-sql-schema
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2020
 * @license   https://opensource.org/licenses/MIT
 */
interface JsonColumnInterface extends ColumnInterface
{
    public const SQL_TYPE = 'JSON';
}