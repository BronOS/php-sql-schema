<?php

/**
 * DB
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@phpsuit.net so we can send you a copy immediately.
 *
 * @package   beachbum\db
 * @author    Oleg Bronzov <oleg@bbumgames.com>
 * @copyright 2020
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

declare(strict_types=1);

namespace BronOS\PhpSqlSchema\Tests;


use BronOS\PhpSqlSchema\Column\Numeric\IntColumn;
use PHPUnit\Framework\TestCase;

/**
 * Test.
 *
 * @package   beachbum\db
 * @author    Oleg Bronzov <oleg@bbumgames.com>
 * @copyright 2020
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class BaseTestCase extends TestCase
{
    protected \PDO $pdo;

    protected function setUp(): void
    {
        $this->pdo = new \PDO(
            'mysql:host=127.0.0.1;port=3306;dbname=spades;charset=utf8',
            'root',
            'root',
            [
                \PDO::ATTR_PERSISTENT => true,
                \PDO::ATTR_EMULATE_PREPARES => true,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ]
        );
    }

    public function testMeta(): void
    {
        $column = new IntColumn('test', 11);

        $sth = $this->pdo->prepare('SHOW COLUMNS FROM oleg');
        $sth->execute();
        $res = $sth->fetchAll();

        echo "<pre>";
        var_dump($res);
        echo "</pre>";
        die();
    }
}