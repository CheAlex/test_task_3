<?php
declare(strict_types=1);

namespace CheAlex\Garage\Vehicle\Ability;

use CheAlex\Garage\Vehicle\VehicleInterface;

/**
 * Trait RefuelAwareTrait
 * @package CheAlex\Garage\Vehicle\Ability
 */
trait RefuelAwareTrait
{
    /**
     * @param string $fuel
     * @return string action result
     */
    public function refuel(string $fuel = 'gas'): string
    {
        /** @var VehicleInterface $this */

        return $this->getType() . ' "' . $this->getName() . '" refuel ' . $fuel;
    }
}
