<?php
declare(strict_types=1);

namespace CheAlex\Garage;

use CheAlex\Garage\Vehicle\VehicleInterface;
use CheAlex\Garage\Logger\LoggerInterface;

/**
 * Class Garage
 * @package CheAlex\Garage
 */
class Garage implements GarageInterface
{
    /**
     * @var \SplObjectStorage|VehicleInterface[]
     */
    private $vehicles;

    /**
     * @var string Garage name
     */
    private $name;

    /**
     * @var LoggerInterface Logger for vehicle actions.
     */
    private $logger;

    /**
     * @var int Count actions between refuels.
     */
    private $countActionsBetweenRefuels;

    /**
     * Garage constructor.
     * @param string $name
     * @param LoggerInterface $logger
     * @param int $countActionsBetweenMeals
     */
    public function __construct(
        string $name,
        LoggerInterface $logger,
        int $countActionsBetweenMeals = 3
    ) {
        $this->vehicles = new \SplObjectStorage();

        $this->name = $name;
        $this->logger = $logger;
        $this->countActionsBetweenRefuels = $countActionsBetweenMeals;
    }

    /**
     * {@inheritdoc}
     */
    public function addVehicle(VehicleInterface $vehicle): void
    {
        $this->vehicles->attach($vehicle);
    }

    /**
     * {@inheritdoc}
     */
    public function removeVehicle(VehicleInterface $vehicle): void
    {
        $this->vehicles->detach($vehicle);
    }

    /**
     * {@inheritdoc}
     */
    public function hasVehicle(VehicleInterface $vehicle): bool
    {
        return $this->vehicles->contains($vehicle);
    }

    /**
     * {@inheritdoc}
     */
    public function countVehicles(): int
    {
        return $this->vehicles->count();
    }

    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function work(): void
    {
        foreach ($this->vehicles as $vehicle) {
            $this->logVehicleAction($vehicle->refuel('gas'));
        }

        foreach ($this->vehicles as $vehicle) {
            for ($i = 0; $i < $this->countActionsBetweenRefuels; ++$i) {
                $this->logVehicleAction($vehicle->doRandomLiveAction());
            }
        }

        foreach ($this->vehicles as $vehicle) {
            $this->logVehicleAction($vehicle->refuel('gas'));
        }

        foreach ($this->vehicles as $vehicle) {
            for ($i = 0; $i < $this->countActionsBetweenRefuels; ++$i) {
                $this->logVehicleAction($vehicle->doRandomLiveAction());
            }
        }

        foreach ($this->vehicles as $vehicle) {
            $this->logVehicleAction($vehicle->refuel('gas'));
        }
    }

    /**
     * @param string $actionResult
     */
    private function logVehicleAction(string $actionResult): void
    {
        $this->logger->log(sprintf('In garage "%s" %s', $this->getName(), $actionResult));
    }
}
