<?php
declare(strict_types=1);

namespace CheAlex\Garage\Vehicle\Ability;

use CheAlex\Garage\Vehicle\VehicleInterface;

/**
 * Trait MusicOnAwareTrait
 * @package CheAlex\Garage\Vehicle\Ability
 */
trait MusicOnAwareTrait
{
    /**
     * @return string action result
     */
    public function musicOn(): string
    {
        /** @var VehicleInterface $this */

        return $this->getType() . ' "' . $this->getName() . '" music switched on';
    }
}
