<?php
declare(strict_types=1);

namespace CheAlex\Garage\Vehicle\Ability;

/**
 * Interface StopAwareAwareInterface
 * @package CheAlex\Garage\Vehicle\Ability
 */
interface StopAwareAwareInterface extends AbilityAwareInterface
{
    /**
     * @return string action result
     */
    public function stop(): string;
}
