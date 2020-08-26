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

namespace BronOS\PhpSqlSchema\Column;


use BronOS\PhpSqlSchema\Exception\ColumnDeclarationException;

/**
 * Abstract SQL column.
 *
 * @package   bronos\php-sql-schema
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2020
 * @license   https://opensource.org/licenses/MIT
 */
abstract class AbstractColumn implements ColumnInterface
{
    private string $name;
    private bool $nullable = false;
    private ?string $default = null;
    private ?string $comment = null;

    /**
     * AbstractSQLColumn constructor.
     *
     * @param string      $name
     * @param bool        $isNullable
     * @param string|null $default
     * @param string|null $comment
     *
     * @throws ColumnDeclarationException
     */
    public function __construct(
        string $name,
        bool $isNullable = false,
        ?string $default = null,
        ?string $comment = null
    ) {
        $this->name = $name;
        $this->nullable = $isNullable;
        $this->comment = $comment;

        $this->setDefault($default);

        $this->validate();
    }

    /**
     * @throws ColumnDeclarationException
     */
    private function validate(): void
    {
        if (!$this->isNullable() && $this->isDefaultNull()) {
            throw new ColumnDeclarationException('Invalid nullable state');
        }
    }

    /**
     * @param string|null $default
     */
    private function setDefault(?string $default): void
    {
        if (!is_null($default)) {
            $defaultUpper = strtoupper($default);
            if ($defaultUpper === self::NULL_KEYWORD) {
                $default = $defaultUpper;
            }
        }

        $this->default = $default;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function isNullable(): bool
    {
        return $this->nullable;
    }

    /**
     * @return string|null
     */
    public function getDefault(): ?string
    {
        return $this->default;
    }

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * Check whether default value marked as NULL.
     *
     * @return bool
     */
    public function isDefaultNull(): bool
    {
        return $this->default === self::NULL_KEYWORD;
    }
}