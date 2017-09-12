<?php
declare(strict_types=1);

namespace CheAlex\Garage;

use CheAlex\Garage\Vehicle\VehicleInterface;

/**
 * Interface GarageInterface
 * @package CheAlex\Garage
 */
interface GarageInterface
{
    /**
     * @param VehicleInterface $vehicle
     */
    public function addVehicle(VehicleInterface $vehicle): void;

    /**
     * @param VehicleInterface $vehicle
     */
    public function removeVehicle(VehicleInterface $vehicle): void;

    /**
     * @param VehicleInterface $vehicle
     * @return bool
     */
    public function hasVehicle(VehicleInterface $vehicle): bool;

    /**
     * @return int
     */
    public function countVehicles(): int;

    /**
     * @return string Garage name
     */
    public function getName(): string;

    /**
     * Simple emulation of garage working day.
     */
    public function work(): void;
}
