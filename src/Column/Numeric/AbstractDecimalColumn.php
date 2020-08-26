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

namespace BronOS\PhpSqlSchema\Column\Numeric;


use BronOS\PhpSqlSchema\Column\Attribute\DecimalSizeColumnAttributeTrait;
use BronOS\PhpSqlSchema\Exception\ColumnDeclarationException;

/**
 * Abstract decimal SQL column representation.
 *
 * @package   bronos\php-sql-schema
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2020
 * @license   https://opensource.org/licenses/MIT
 */
abstract class AbstractDecimalColumn extends AbstractNumericColumn
{
    use DecimalSizeColumnAttributeTrait {
        DecimalSizeColumnAttributeTrait::__construct as __decimalSizeConstruct;
    }

    /**
     * AbstractDecimalColumn constructor.
     *
     * @param string      $name
     * @param int         $precision
     * @param int         $scale
     * @param bool        $isUnsigned
     * @param bool        $isNullable
     * @param string|null $default
     * @param bool        $isZerofill
     * @param string|null $comment
     *
     * @throws ColumnDeclarationException
     */
    public function __construct(
        string $name,
        int $precision = 10,
        int $scale = 2,
        bool $isUnsigned = false,
        bool $isNullable = false,
        ?string $default = null,
        bool $isZerofill = false,
        ?string $comment = null
    ) {
        parent::__construct(
            $name,
            $isUnsigned,
            $isNullable,
            $default,
            $isZerofill,
            $comment
        );

        $this->__decimalSizeConstruct($precision, $scale);
    }
}