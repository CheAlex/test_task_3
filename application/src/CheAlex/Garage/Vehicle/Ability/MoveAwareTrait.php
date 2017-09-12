<?php
declare(strict_types=1);

namespace CheAlex\Garage\Vehicle\Ability;

use CheAlex\Garage\Vehicle\VehicleInterface;

/**
 * Trait MoveAwareTrait
 * @package CheAlex\Garage\Vehicle\Ability
 */
trait MoveAwareTrait
{
    /**
     * @return string action result
     */
    public function move(): string
    {
        /** @var VehicleInterface $this */

        return $this->getType() . ' "' . $this->getName() . '" moving';
    }
}
