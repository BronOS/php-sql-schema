<?php

/**
 * Sql
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
 * @package   bronos\php-sql
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2020
 * @license   https://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace BronOS\PhpSqlSchema\Column\Bool;


use BronOS\PhpSqlSchema\Column\ColumnInterface;

/**
 * BOOL SQL column representation.
 *
 * MySQL does not have built-in Boolean type. However, it uses TINYINT(1) instead.
 * To make it more convenient, MySQL provides BOOLEAN or BOOL as the synonym of TINYINT(1).
 *
 * In MySQL, zero is considered as false, and non-zero value is considered as true.
 * To use Boolean literals, you use the constants TRUE and FALSE that evaluate to 1 and 0 respectively.
 *
 * See the following example:
 * SELECT true, false, TRUE, FALSE, True, False;
 * -- 1 0 1 0 1 0
 *
 * @package   bronos\php-sql
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2020
 * @license   https://opensource.org/licenses/MIT
 */
interface BoolColumnInterface
    extends ColumnInterface
{
    public const SQL_TYPE = 'BOOL';
}