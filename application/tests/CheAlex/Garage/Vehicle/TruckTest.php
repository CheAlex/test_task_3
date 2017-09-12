<?php
declare(strict_types=1);

namespace Tests\CheAlex\Garage\Vehicle;

use CheAlex\Garage\Vehicle\Truck;
use PHPUnit\Framework\TestCase;

/**
 * Class TruckTest
 * @package Tests\CheAlex\Garage\Vehicle
 */
class TruckTest extends TestCase
{
    /**
     * @param Truck $truck
     * @param string $name
     *
     * @dataProvider getNameDataProvider
     */
    public function testGetName(Truck $truck, string $name): void
    {
        $this->assertEquals($name, $truck->getName());
    }

    /**
     * @param Truck $truck
     * @param string $type
     *
     * @dataProvider getTypeDataProvider
     */
    public function testGetType(Truck $truck, string $type): void
    {
        $this->assertEquals($type, $truck->getType());
    }

    public function testDoRandomLiveAction(): void
    {
        $truck = new Truck('Kamaz');
        $this->assertInternalType('string', $truck->doRandomLiveAction());
    }

    /**
     * @param Truck $truck
     * @param string $fuel
     * @param string $expected
     *
     * @dataProvider refuelDataProvider
     */
    public function testRefuel(Truck $truck, string $fuel, string $expected): void
    {
        $this->assertEquals($expected, $truck->refuel($fuel));
    }

    /**
     * @param Truck $truck
     * @param string $expected
     *
     * @dataProvider stopDataProvider
     */
    public function testStop(Truck $truck, string $expected): void
    {
        $this->assertEquals($expected, $truck->stop());
    }

    /**
     * @return array
     */
    public function getNameDataProvider(): array
    {
        return [
            [new Truck('Kamaz'), 'Kamaz'],
        ];
    }

    /**
     * @return array
     */
    public function getTypeDataProvider(): array
    {
        return [
            [new Truck('Kamaz'), 'truck'],
        ];
    }

    /**
     * @return array
     */
    public function refuelDataProvider(): array
    {
        return [
            [new Truck('Kamaz'), 'gas', 'truck "Kamaz" refuel gas'],
        ];
    }

    /**
     * @return array
     */
    public function stopDataProvider(): array
    {
        return [
            [new Truck('Kamaz'), 'truck "Kamaz" stopped'],
        ];
    }
}
