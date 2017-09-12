<?php
declare(strict_types=1);

namespace CheAlex\Garage\Vehicle;

/**
 * Interface VehicleInterface
 * @package CheAlex\Garage\Vehicle
 */
interface VehicleInterface
{
    /**
     * Ger vehicle name.
     *
     * @return string Vehicle name
     */
    public function getName(): string;

    /**
     * Do random live action.
     *
     * @return string result description
     */
    public function doRandomLiveAction(): string;

    /**
     * Get vehicle type.
     *
     * @return string
     */
    public function getType(): string;
}
