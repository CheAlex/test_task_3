<?php
declare(strict_types=1);

namespace CheAlex\Garage\Vehicle\Ability;

/**
 * Interface MusicOnAwareAwareInterface
 * @package CheAlex\Garage\Vehicle\Ability
 */
interface MusicOnAwareAwareInterface extends AbilityAwareInterface
{
    /**
     * @return string action result
     */
    public function musicOn(): string;
}
