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


use BronOS\PhpSqlSchema\Column\Attribute\FloatSizeColumnAttributeTrait;
use BronOS\PhpSqlSchema\Exception\ColumnDeclarationException;

/**
 * Abstract float SQL column representation.
 *
 * @package   bronos\php-sql-schema
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2020
 * @license   https://opensource.org/licenses/MIT
 */
abstract class AbstractFloatColumn extends AbstractNumericColumn implements BaseFloatColumnInterface
{
    use FloatSizeColumnAttributeTrait {
        FloatSizeColumnAttributeTrait::__construct as __floatSizeConstruct;
    }

    /**
     * @param string      $name
     * @param int|null    $precision
     * @param int|null    $scale
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
        ?int $precision = null,
        ?int $scale = null,
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

        $this->__floatSizeConstruct($precision, $scale);
    }
}