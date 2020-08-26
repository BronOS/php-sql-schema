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


use BronOS\PhpSqlSchema\Column\Attribute\SizeColumnAttributeTrait;
use BronOS\PhpSqlSchema\Exception\SQLColumnDeclarationException;

/**
 * Abstract sized string SQL column representation.
 *
 * @package   bronos\php-sql-schema
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2020
 * @license   https://opensource.org/licenses/MIT
 */
abstract class AbstractSizedStringColumn extends AbstractStringColumn
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
     * @param string|null $charset
     * @param string|null $collate
     * @param string|null $comment
     *
     * @throws SQLColumnDeclarationException
     */
    public function __construct(
        string $name,
        int $size = 1,
        bool $isNullable = false,
        ?string $default = null,
        ?string $charset = null,
        ?string $collate = null,
        ?string $comment = null
    ) {
        parent::__construct(
            $name,
            $isNullable,
            $default,
            $charset,
            $collate,
            $comment
        );

        $this->__sizeConstruct($size);
    }
}