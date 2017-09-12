<?php
declare(strict_types=1);

namespace CheAlex\Garage\Vehicle;

use CheAlex\Garage\Vehicle\Ability\MusicOnAwareAwareInterface;
use CheAlex\Garage\Vehicle\Ability\MoveAwareAwareInterface;
use CheAlex\Garage\Vehicle\Ability\MoveAwareTrait;
use CheAlex\Garage\Vehicle\Ability\MusicOnAwareTrait;

/**
 * Class Car
 * @package CheAlex\Garage\Vehicle
 */
class Car extends AbstractVehicle implements MoveAwareAwareInterface, MusicOnAwareAwareInterface
{
    use MoveAwareTrait;
    use MusicOnAwareTrait;
}
