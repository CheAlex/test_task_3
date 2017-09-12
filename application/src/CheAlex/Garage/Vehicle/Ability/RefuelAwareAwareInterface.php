<?php
declare(strict_types=1);

namespace CheAlex\Garage\Vehicle\Ability;

/**
 * Interface RefuelAwareAwareInterface
 * @package CheAlex\Garage\Vehicle\Ability
 */
interface RefuelAwareAwareInterface extends AbilityAwareInterface
{
    /**
     * @param string $fuel
     * @return string action result
     */
    public function refuel(string $fuel): string;
}
