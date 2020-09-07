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

namespace BronOS\PhpSqlSchema\Relation;


use BronOS\PhpSqlSchema\Relation\Action\ActionInterface;

/**
 * PHP representation of SQL's foreign key.
 *
 * Foreign key permit cross-referencing related data across tables, and foreign key constraints,
 * which help keep the related data consistent.
 *
 * A foreign key relationship involves a parent table that holds the initial column values,
 * and a child table with column values that reference the parent column values.
 * A foreign key constraint is defined on the child table.
 *
 * @package   bronos\php-sql-schema
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2020
 * @license   https://opensource.org/licenses/MIT
 */
class ForeignKey implements ForeignKeyInterface
{
    private string $name;
    private string $sourceField;
    private string $targetTable;
    private string $targetField;
    private ?ActionInterface $onDelete = null;
    private ?ActionInterface $onUpdate = null;

    /**
     * ForeignKey constructor.
     *
     * @param string               $sourceField
     * @param string               $targetTable
     * @param string               $targetField
     * @param string|null          $name
     * @param ActionInterface|null $onDelete
     * @param ActionInterface|null $onUpdate
     */
    public function __construct(
        string $sourceField,
        string $targetTable,
        string $targetField,
        ?string $name = null,
        ?ActionInterface $onDelete = null,
        ?ActionInterface $onUpdate = null
    ) {
        $this->name = $this->generateName($name, $sourceField, $targetTable, $targetField);
        $this->sourceField = $sourceField;
        $this->targetTable = $targetTable;
        $this->targetField = $targetField;
        $this->onDelete = $onDelete;
        $this->onUpdate = $onUpdate;
    }

    /**
     * @param string|null $name
     * @param string      $sourceField
     * @param string      $targetTable
     * @param string      $targetField
     *
     * @return string
     */
    private function generateName(?string $name, string $sourceField, string $targetTable, string $targetField): string
    {
        if (!is_null($name)) {
            return $name;
        }

        return implode("_", [$sourceField, $targetTable, $targetField, 'fk']);
    }

    /**
     * Returns relation's name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Returns source field name.
     *
     * @return string
     */
    public function getSourceField(): string
    {
        return $this->sourceField;
    }

    /**
     * Returns target table name.
     *
     * @return string
     */
    public function getTargetTable(): string
    {
        return $this->targetTable;
    }

    /**
     * Returns target field name.
     *
     * @return string
     */
    public function getTargetField(): string
    {
        return $this->targetField;
    }

    /**
     * Returns on delete action.
     *
     * @return ActionInterface|null
     */
    public function getOnDeleteAction(): ?ActionInterface
    {
        return $this->onDelete;
    }

    /**
     * Returns on update action.
     *
     * @return ActionInterface|null
     */
    public function getOnUpdateAction(): ?ActionInterface
    {
        return $this->onUpdate;
    }
}