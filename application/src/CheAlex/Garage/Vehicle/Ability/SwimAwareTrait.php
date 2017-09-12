<?php
declare(strict_types=1);

namespace CheAlex\Garage\Vehicle\Ability;

use CheAlex\Garage\Vehicle\VehicleInterface;

/**
 * Trait SwimAwareTrait
 * @package CheAlex\Garage\Vehicle\Ability
 */
trait SwimAwareTrait
{
    /**
     * @return string action result
     */
    public function swim(): string
    {
        /** @var VehicleInterface $this */

        return $this->getType() . ' "' . $this->getName() . '" swimming';
    }
}
