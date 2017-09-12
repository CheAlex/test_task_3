<?php
declare(strict_types=1);

namespace CheAlex\Garage\Vehicle\Ability;

/**
 * Interface SwimAwareAwareInterface
 * @package CheAlex\Garage\Vehicle\Ability
 */
interface SwimAwareAwareInterface extends AbilityAwareInterface
{
    /**
     * @return string action result
     */
    public function swim(): string;
}
