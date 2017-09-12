<?php
declare(strict_types=1);

namespace CheAlex\Garage\Vehicle\Ability;

use CheAlex\Garage\Vehicle\VehicleInterface;

/**
 * Trait TakeOffAwareTrait
 * @package CheAlex\Garage\Vehicle\Ability
 */
trait TakeOffAwareTrait
{
    /**
     * @return string action result
     */
    public function takeOff(): string
    {
        /** @var VehicleInterface $this */

        return $this->getType() . ' "' . $this->getName() . '" took off';
    }
}
