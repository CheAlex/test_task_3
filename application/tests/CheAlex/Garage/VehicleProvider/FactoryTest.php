<?php
declare(strict_types=1);

namespace Tests\CheAlex\Garage\Vehicle;

use CheAlex\Garage\Vehicle\VehicleInterface;
use CheAlex\Garage\VehicleProvider\Factory;
use CheAlex\Garage\DataSource\DataSourceInterface;
use CheAlex\Garage\Exception\Exception;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;

/**
 * Class FactoryTest
 * @package Tests\CheAlex\Garage\Vehicle
 */
class FactoryTest extends TestCase
{
    /**
     * @var ObjectProphecy
     */
    private $dataSource;

    /**
     * @var Factory
     */
    private $factory;

    protected function setUp(): void
    {
        $this->dataSource = $this->prophesize(DataSourceInterface::class);

        $this->factory = new Factory($this->dataSource->reveal());
    }

    public function testGetVehiclesValidDataValidResult()
    {
        $data = [
            [
                'type' => 'car',
                'name' => 'BMW'
            ],
            [
                'type' => 'boat',
                'name' => 'Ranger'
            ],
            [
                'type' => 'helicopter',
                'name' => 'Apache'
            ],
            [
                'type' => 'truck',
                'name' => 'Kamaz'
            ],
        ];

        $this->dataSource->getData()->shouldBeCalledTimes(1)->willReturn($data);

        $count = 0;

        foreach ($this->factory->getVehicles() as $vehicle) {
            $this->assertInstanceOf(VehicleInterface::class, $vehicle);
            $this->assertEquals($data[$count]['name'], $vehicle->getName());
            ++$count;
        }

        $this->assertEquals(4, $count);
    }

    public function testGetVehiclesDataWithoutNameThrowException()
    {
        $this->dataSource->getData()->shouldBeCalledTimes(1)->willReturn([
            [
                'type' => 'car',
            ],
        ]);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Data with key "name" not exist or zero length');

        foreach ($this->factory->getVehicles() as $vehicle) {}
    }

    public function testGetVehiclesDataWithoutTypeThrowException()
    {
        $this->dataSource->getData()->shouldBeCalledTimes(1)->willReturn([
            [
                'name' => 'Kamaz'
            ],
        ]);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Data with key "type" not exist or zero length');

        foreach ($this->factory->getVehicles() as $vehicle) {}
    }

    public function testGetVehiclesDataWrongTypeThrowException()
    {
        $this->dataSource->getData()->shouldBeCalledTimes(1)->willReturn([
            [
                'type' => 'plain',
                'name' => 'Boeing'
            ],
        ]);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Undefined vehicle type "plain"');

        foreach ($this->factory->getVehicles() as $vehicle) {}
    }
}
