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


use BronOS\PhpSqlSchema\Column\AbstractColumn;
use BronOS\PhpSqlSchema\Column\Attribute\SizeColumnAttributeTrait;
use BronOS\PhpSqlSchema\Exception\SQLColumnDeclarationException;

/**
 * BIT SQL column representation.
 *
 * The BIT data type is used to store bit values.
 * A type of BIT(M) enables storage of M-bit values. M can range from 1 to 64.
 *
 * To specify bit values, b'value' notation can be used.
 * "value" is a binary value written using zeros and ones.
 * For example, b'111' and b'10000000' represent 7 and 128, respectively.
 *
 * If you assign a value to a BIT(M) column that is less than M bits long,
 * the value is padded on the left with zeros.
 * For example, assigning a value of b'101' to a BIT(6) column is, in effect,
 * the same as assigning b'000101'.
 *
 * @package   bronos\php-sql-schema
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2020
 * @license   https://opensource.org/licenses/MIT
 */
class BitColumn extends AbstractColumn implements BitColumnInterface
{
    use SizeColumnAttributeTrait {
        SizeColumnAttributeTrait::__construct as __sizeConstruct;
    }

    /**
     * IntColumn constructor.
     *
     * @param string      $name
     * @param int         $size
     * @param bool        $isNullable
     * @param string|null $default
     * @param string|null $comment
     *
     * @throws SQLColumnDeclarationException
     */
    public function __construct(
        string $name,
        int $size = 1,
        bool $isNullable = false,
        ?string $default = null,
        ?string $comment = null
    ) {
        parent::__construct(
            $name,
            $isNullable,
            is_null($default) ? null : (string)$default,
            $comment
        );

        $this->__sizeConstruct($size);
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