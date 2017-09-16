<?php
declare(strict_types=1);

namespace Tests\CheAlex\Garage\Vehicle;

use CheAlex\Garage\DataSource\PhpArrayDataSource;
use CheAlex\Garage\Exception\Exception;
use PHPUnit\Framework\TestCase;

/**
 * Class PhpArrayDataSourceTest
 * @package Tests\CheAlex\Garage\Vehicle
 */
class PhpArrayDataSourceTest extends TestCase
{
    public function testGetData_validFixture(): void
    {
        $dataSource = new PhpArrayDataSource(__DIR__.'/fixtures/vehicles.php');
        $data = $dataSource->getData();

        $this->assertInternalType('array', $data);
    }

    public function testGetData_notExistFixture(): void
    {
        $dataSource = new PhpArrayDataSource(__DIR__.'/fixtures/not_exist_file.php');
        $this->expectException(Exception::class);
        $this->expectExceptionMessageRegExp('#fixtures/not_exist_file.php" not exist or not readable.$#');

        $dataSource->getData();
    }

    public function testGetData_fixtureReturnNotArray(): void
    {
        $dataSource = new PhpArrayDataSource(__DIR__.'/fixtures/fixture_return_not_array.php');
        $this->expectException(Exception::class);
        $this->expectExceptionMessageRegExp('#fixtures/fixture_return_not_array.php" return not array value.$#');

        $dataSource->getData();
    }
}
