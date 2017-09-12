<?php
declare(strict_types=1);

namespace CheAlex\Garage\Vehicle\Ability;

/**
 * Interface TakeOffAwareAwareInterface
 * @package CheAlex\Garage\Vehicle\Ability
 */
interface TakeOffAwareAwareInterface extends AbilityAwareInterface
{
    /**
     * @return string action result
     */
    public function takeOff(): string;
}
