<?php
declare(strict_types=1);

namespace Tests\CheAlex\Garage\Vehicle;

use CheAlex\Garage\Vehicle\Car;
use CheAlex\Garage\Vehicle\Boat;
use CheAlex\Garage\Logger\LoggerInterface;
use CheAlex\Garage\Garage;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\Prophecy\ObjectProphecy;

class GarageTest extends TestCase
{
    /**
     * @var Garage
     */
    private $garage;

    /**
     * @var LoggerInterface|ObjectProphecy
     */
    private $logger;

    /**
     * @var ObjectProphecy
     */
    private $car;

    /**
     * @var ObjectProphecy
     */
    private $boat;

    public function setUp(): void
    {
        $this->logger = $this->prophesize(LoggerInterface::class);
        $this->garage = new Garage('Ecomotize garage', $this->logger->reveal(), 3);
        $this->car = $this->prophesize(Car::class);
        $this->boat = $this->prophesize(Boat::class);
    }

    public function testGetName(): void
    {
        $this->assertEquals('Ecomotize garage', $this->garage->getName());
    }

    public function testAddVehicle(): void
    {
        $car = $this->car->reveal();
        $boat = $this->boat->reveal();

        $this->assertEquals(0, $this->garage->countVehicles());
        $this->garage->addVehicle($car);
        $this->assertEquals(1, $this->garage->countVehicles());
        $this->assertTrue($this->garage->hasVehicle($car));
        $this->garage->addVehicle($boat);
        $this->assertEquals(2, $this->garage->countVehicles());
        $this->assertTrue($this->garage->hasVehicle($boat));
    }

    public function testRemoveVehicle(): void
    {
        $car = $this->car->reveal();
        $boat = $this->boat->reveal();
        $this->garage->addVehicle($car);
        $this->garage->addVehicle($boat);

        $this->assertEquals(2, $this->garage->countVehicles());
        $this->garage->removeVehicle($car);
        $this->assertEquals(1, $this->garage->countVehicles());
        $this->assertFalse($this->garage->hasVehicle($car));
        $this->garage->removeVehicle($boat);
        $this->assertEquals(0, $this->garage->countVehicles());
        $this->assertFalse($this->garage->hasVehicle($boat));
    }

    public function testWork(): void
    {
        $car = $this->car->reveal();
        $this->garage->addVehicle($car);

        $this->car->refuel('gas')->shouldBeCalledTimes(3);

        $this->car->doRandomLiveAction()->shouldBeCalledTimes(6);

        $this->logger->log(Argument::containingString('In garage "Ecomotize garage"'))->shouldBeCalledTimes(9);

        $this->garage->work();
    }
}
