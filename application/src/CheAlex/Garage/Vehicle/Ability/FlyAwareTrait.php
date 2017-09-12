<?php
declare(strict_types=1);

namespace CheAlex\Garage\Vehicle\Ability;

use CheAlex\Garage\Vehicle\VehicleInterface;

/**
 * Trait FlyAwareTrait
 * @package CheAlex\Garage\Vehicle\Ability
 */
trait FlyAwareTrait
{
    /**
     * @return string action result
     */
    public function fly(): string
    {
        /** @var VehicleInterface $this */

        return $this->getType() . ' "' . $this->getName() . '" flying';
    }
}
