<?php
declare(strict_types=1);

namespace CheAlex\Garage\Vehicle\Ability;

/**
 * Interface LandingAwareAwareInterface
 * @package CheAlex\Garage\Vehicle\Ability
 */
interface LandingAwareAwareInterface extends AbilityAwareInterface
{
    /**
     * @return string action result
     */
    public function landing(): string;
}
