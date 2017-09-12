<?php
declare(strict_types=1);

namespace CheAlex\Garage\Vehicle\Ability;

/**
 * Interface FlyAwareAwareInterface
 * @package CheAlex\Garage\Vehicle\Ability
 */
interface FlyAwareAwareInterface extends AbilityAwareInterface
{
    /**
     * @return string action result
     */
    public function fly(): string;
}
