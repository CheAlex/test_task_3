<?php
declare(strict_types=1);

namespace CheAlex\Garage\Vehicle\Ability;

use CheAlex\Garage\Vehicle\VehicleInterface;

/**
 * Trait StopAwareTrait
 * @package CheAlex\Garage\Vehicle\Ability
 */
trait StopAwareTrait
{
    /**
     * @return string action result
     */
    public function stop(): string
    {
        /** @var VehicleInterface $this */

        return $this->getType() . ' "' . $this->getName() . '" stopped';
    }
}
