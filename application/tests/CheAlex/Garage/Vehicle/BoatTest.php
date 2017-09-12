<?php
declare(strict_types=1);

namespace Tests\CheAlex\Garage\Vehicle;

use CheAlex\Garage\Vehicle\Boat;
use PHPUnit\Framework\TestCase;

/**
 * Class BoatTest
 * @package Tests\CheAlex\Garage\Vehicle
 */
class BoatTest extends TestCase
{
    /**
     * @param Boat $boat
     * @param string $name
     *
     * @dataProvider getNameDataProvider
     */
    public function testGetName(Boat $boat, string $name): void
    {
        $this->assertEquals($name, $boat->getName());
    }

    /**
     * @param Boat $boat
     * @param string $type
     *
     * @dataProvider getTypeDataProvider
     */
    public function testGetType(Boat $boat, string $type): void
    {
        $this->assertEquals($type, $boat->getType());
    }

    public function testDoRandomLiveAction(): void
    {
        $boat = new Boat('Ranger');
        $this->assertInternalType('string', $boat->doRandomLiveAction());
    }
    
    /**
     * @param Boat $boat
     * @param string $fuel
     * @param string $expected
     *
     * @dataProvider refuelDataProvider
     */
    public function testRefuel(Boat $boat, string $fuel, string $expected): void
    {
        $this->assertEquals($expected, $boat->refuel($fuel));
    }

    /**
     * @param Boat $boat
     * @param string $expected
     *
     * @dataProvider stopDataProvider
     */
    public function testStop(Boat $boat, string $expected): void
    {
        $this->assertEquals($expected, $boat->stop());
    }

    /**
     * @param Boat $boat
     * @param string $expected
     *
     * @dataProvider moveDataProvider
     */
    public function testMove(Boat $boat, string $expected): void
    {
        $this->assertEquals($expected, $boat->move());
    }

    /**
     * @param Boat $boat
     * @param string $expected
     *
     * @dataProvider swimDataProvider
     */
    public function testSwim(Boat $boat, string $expected): void
    {
        $this->assertEquals($expected, $boat->swim());
    }

    /**
     * @return array
     */
    public function getNameDataProvider(): array
    {
        return [
            [new Boat('Ranger'), 'Ranger'],
        ];
    }

    /**
     * @return array
     */
    public function getTypeDataProvider(): array
    {
        return [
            [new Boat('Ranger'), 'boat'],
        ];
    }
    
    /**
     * @return array
     */
    public function refuelDataProvider(): array
    {
        return [
            [new Boat('Ranger'), 'gas', 'boat "Ranger" refuel gas'],
        ];
    }

    /**
     * @return array
     */
    public function stopDataProvider(): array
    {
        return [
            [new Boat('Ranger'), 'boat "Ranger" stopped'],
        ];
    }

    /**
     * @return array
     */
    public function moveDataProvider(): array
    {
        return [
            [new Boat('Ranger'), 'boat "Ranger" moving'],
        ];
    }

    /**
     * @return array
     */
    public function swimDataProvider(): array
    {
        return [
            [new Boat('Ranger'), 'boat "Ranger" swimming'],
        ];
    }
}
