<?php
declare(strict_types=1);

namespace CheAlex\Garage\Vehicle\Ability;

/**
 * Interface MoveAwareAwareInterface
 * @package CheAlex\Garage\Vehicle\Ability
 */
interface MoveAwareAwareInterface extends AbilityAwareInterface
{
    /**
     * @return string action result
     */
    public function move(): string;
}
