<?php
declare(strict_types=1);

namespace CheAlex\Garage\Vehicle\Ability;

use CheAlex\Garage\Vehicle\VehicleInterface;

/**
 * Trait LandingAwareTrait
 * @package CheAlex\Garage\Vehicle\Ability
 */
trait LandingAwareTrait
{
    /**
     * @return string action result
     */
    public function landing(): string
    {
        /** @var VehicleInterface $this */

        return $this->getType() . ' "' . $this->getName() . '" landing ';
    }
}
