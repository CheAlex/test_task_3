<?php
declare(strict_types=1);

namespace Tests\CheAlex\Garage\Vehicle;

use CheAlex\Garage\Vehicle\Helicopter;
use PHPUnit\Framework\TestCase;

/**
 * Class HelicopterTest
 * @package Tests\CheAlex\Garage\Vehicle
 */
class HelicopterTest extends TestCase
{
    /**
     * @param Helicopter $helicopter
     * @param string $name
     *
     * @dataProvider getNameDataProvider
     */
    public function testGetName(Helicopter $helicopter, string $name): void
    {
        $this->assertEquals($name, $helicopter->getName());
    }

    /**
     * @param Helicopter $helicopter
     * @param string $type
     *
     * @dataProvider getTypeDataProvider
     */
    public function testGetType(Helicopter $helicopter, string $type): void
    {
        $this->assertEquals($type, $helicopter->getType());
    }

    public function testDoRandomLiveAction(): void
    {
        $helicopter = new Helicopter('Apache');
        $this->assertInternalType('string', $helicopter->doRandomLiveAction());
    }

    /**
     * @param Helicopter $helicopter
     * @param string $fuel
     * @param string $expected
     *
     * @dataProvider refuelDataProvider
     */
    public function testRefuel(Helicopter $helicopter, string $fuel, string $expected): void
    {
        $this->assertEquals($expected, $helicopter->refuel($fuel));
    }

    /**
     * @param Helicopter $helicopter
     * @param string $expected
     *
     * @dataProvider stopDataProvider
     */
    public function testStop(Helicopter $helicopter, string $expected): void
    {
        $this->assertEquals($expected, $helicopter->stop());
    }

    /**
     * @param Helicopter $helicopter
     * @param string $expected
     *
     * @dataProvider flyDataProvider
     */
    public function testFly(Helicopter $helicopter, string $expected): void
    {
        $this->assertEquals($expected, $helicopter->fly());
    }

    /**
     * @param Helicopter $helicopter
     * @param string $expected
     *
     * @dataProvider takeOffDataProvider
     */
    public function testTakeOff(Helicopter $helicopter, string $expected): void
    {
        $this->assertEquals($expected, $helicopter->takeOff());
    }

    /**
     * @param Helicopter $helicopter
     * @param string $expected
     *
     * @dataProvider flyDataProvider
     */
    public function testLanding(Helicopter $helicopter, string $expected): void
    {
        $this->assertEquals($expected, $helicopter->fly());
    }

    /**
     * @return array
     */
    public function getNameDataProvider(): array
    {
        return [
            [new Helicopter('Apache'), 'Apache'],
        ];
    }

    /**
     * @return array
     */
    public function getTypeDataProvider(): array
    {
        return [
            [new Helicopter('Apache'), 'helicopter'],
        ];
    }

    /**
     * @return array
     */
    public function refuelDataProvider(): array
    {
        return [
            [new Helicopter('Apache'), 'gas', 'helicopter "Apache" refuel gas'],
        ];
    }

    /**
     * @return array
     */
    public function stopDataProvider(): array
    {
        return [
            [new Helicopter('Apache'), 'helicopter "Apache" stopped'],
        ];
    }

    /**
     * @return array
     */
    public function flyDataProvider(): array
    {
        return [
            [new Helicopter('Apache'), 'helicopter "Apache" flying'],
        ];
    }

    /**
     * @return array
     */
    public function landingDataProvider(): array
    {
        return [
            [new Helicopter('Apache'), 'helicopter "Apache" landing'],
        ];
    }

    /**
     * @return array
     */
    public function takeOffDataProvider(): array
    {
        return [
            [new Helicopter('Apache'), 'helicopter "Apache" took off'],
        ];
    }
}
