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

namespace BronOS\PhpSqlSchema\Column\Numeric;


/**
 * A representation of the DOUBLE SQL column. Floating-Point Type (Approximate Value)
 *
 * The FLOAT and DOUBLE types represent approximate numeric data values.
 * MySQL uses four bytes for single-precision values and eight bytes for double-precision values.
 *
 * For FLOAT, the SQL standard permits an optional specification of the precision (but not the range of the exponent)
 * in bits following the keyword FLOAT in parentheses; ; that is, FLOAT(p).
 * MySQL also supports this optional precision specification, but the precision value in FLOAT(p) is used only
 * to determine storage size. A precision from 0 to 23 results in a 4-byte single-precision FLOAT column.
 * A precision from 24 to 53 results in an 8-byte double-precision DOUBLE column.
 *
 * MySQL permits a nonstandard syntax: FLOAT(M,D) or REAL(M,D) or DOUBLE PRECISION(M,D).
 * Here, (M,D) means than values can be stored with up to M digits in total,
 * of which D digits may be after the decimal point.
 * For example, a column defined as FLOAT(7,4) will look like -999.9999 when displayed.
 * MySQL performs rounding when storing values, so if you insert 999.00009 into a FLOAT(7,4) column,
 * the approximate result is 999.0001.
 *
 * Because floating-point values are approximate and not stored as exact values,
 * attempts to treat them as exact in comparisons may lead to problems.
 *
 * For maximum portability, code requiring storage of approximate numeric data values
 * should use FLOAT or DOUBLE PRECISION with no specification of precision or number of digits.
 *
 * @package   bronos\php-sql-schema
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2020
 * @license   https://opensource.org/licenses/MIT
 */
interface DoubleColumnInterface extends BaseDecimalColumnInterface
{
    public const SQL_TYPE = 'DOUBLE';
}