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

namespace BronOS\PhpSqlSchema\Index;


use BronOS\PhpSqlSchema\Exception\DuplicateIndexFieldException;
use BronOS\PhpSqlSchema\Exception\EmptyIndexFieldListException;
use BronOS\PhpSqlSchema\Exception\InvalidIndexFieldTypeException;

/**
 * PHP representation of SQL table key/index.
 *
 * @package   bronos\php-sql-schema
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2020
 * @license   https://opensource.org/licenses/MIT
 */
abstract class AbstractIndex implements IndexInterface
{
    private array $fields = [];
    private string $name;

    /**
     * AbstractIndex constructor.
     *
     * @param array       $fields
     * @param string|null $name
     *
     * @throws DuplicateIndexFieldException
     * @throws EmptyIndexFieldListException
     * @throws InvalidIndexFieldTypeException
     */
    public function __construct(array $fields, ?string $name = null)
    {
        try {
            $this->setFields(...$fields);
        } catch (DuplicateIndexFieldException | EmptyIndexFieldListException $e) {
            throw $e;
        } catch (\Throwable $e) {
            throw new InvalidIndexFieldTypeException('Invalid index field type');
        }

        $this->name = $this->generateName($fields, $name);
    }

    /**
     * @param string ...$fields
     *
     * @throws DuplicateIndexFieldException
     * @throws EmptyIndexFieldListException
     */
    private function setFields(string ...$fields): void
    {
        if (count($fields) == 0) {
            throw new EmptyIndexFieldListException('Empty index field list');
        }

        foreach ($fields as $field) {
            if (in_array($field, $this->fields)) {
                throw new DuplicateIndexFieldException('Duplicate index field');
            }

            $this->fields[] = $field;
        }
    }

    /**
     * @param array       $fields
     * @param string|null $name
     *
     * @return string
     */
    private function generateName(array $fields, ?string $name): string
    {
        if (!is_null($name)) {
            return $name;
        }

        return strtolower(str_replace(' ', '_', $this->getType()))
            . '_'
            . implode('_', $fields)
            . '_idx';
    }

    /**
     * Returns name of index.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Returns list of field names.
     *
     * @return string[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }
}