<?php
declare(strict_types=1);

namespace Tests\CheAlex\Garage\Vehicle;

use CheAlex\Garage\Vehicle\Car;
use PHPUnit\Framework\TestCase;

/**
 * Class CarTest
 * @package Tests\CheAlex\Garage\Vehicle
 */
class CarTest extends TestCase
{
    /**
     * @param Car $car
     * @param string $name
     *
     * @dataProvider getNameDataProvider
     */
    public function testGetName(Car $car, string $name): void
    {
        $this->assertEquals($name, $car->getName());
    }

    /**
     * @param Car $car
     * @param string $type
     *
     * @dataProvider getTypeDataProvider
     */
    public function testGetType(Car $car, string $type): void
    {
        $this->assertEquals($type, $car->getType());
    }

    public function testDoRandomLiveAction(): void
    {
        $car = new Car('BMW');
        $this->assertInternalType('string', $car->doRandomLiveAction());
    }

    /**
     * @param Car $car
     * @param string $fuel
     * @param string $expected
     *
     * @dataProvider refuelDataProvider
     */
    public function testRefuel(Car $car, string $fuel, string $expected): void
    {
        $this->assertEquals($expected, $car->refuel($fuel));
    }

    /**
     * @param Car $car
     * @param string $expected
     *
     * @dataProvider stopDataProvider
     */
    public function testStop(Car $car, string $expected): void
    {
        $this->assertEquals($expected, $car->stop());
    }

    /**
     * @param Car $car
     * @param string $expected
     *
     * @dataProvider moveDataProvider
     */
    public function testMove(Car $car, string $expected): void
    {
        $this->assertEquals($expected, $car->move());
    }

    /**
     * @param Car $car
     * @param string $expected
     *
     * @dataProvider musicOnDataProvider
     */
    public function testMusicOn(Car $car, string $expected): void
    {
        $this->assertEquals($expected, $car->musicOn());
    }

    /**
     * @return array
     */
    public function getNameDataProvider(): array
    {
        return [
            [new Car('BMW'), 'BMW'],
        ];
    }

    /**
     * @return array
     */
    public function getTypeDataProvider(): array
    {
        return [
            [new Car('BMW'), 'car'],
        ];
    }

    /**
     * @return array
     */
    public function refuelDataProvider(): array
    {
        return [
            [new Car('BMW'), 'gas', 'car "BMW" refuel gas'],
        ];
    }

    /**
     * @return array
     */
    public function stopDataProvider(): array
    {
        return [
            [new Car('BMW'), 'car "BMW" stopped'],
        ];
    }

    /**
     * @return array
     */
    public function moveDataProvider(): array
    {
        return [
            [new Car('BMW'), 'car "BMW" moving'],
        ];
    }

    /**
     * @return array
     */
    public function musicOnDataProvider(): array
    {
        return [
            [new Car('BMW'), 'car "BMW" music switched on'],
        ];
    }
}
