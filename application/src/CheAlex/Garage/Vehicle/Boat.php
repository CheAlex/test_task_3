<?php
declare(strict_types=1);

namespace CheAlex\Garage\Vehicle;

use CheAlex\Garage\Vehicle\Ability\SwimAwareAwareInterface;
use CheAlex\Garage\Vehicle\Ability\SwimAwareTrait;
use CheAlex\Garage\Vehicle\Ability\MoveAwareAwareInterface;
use CheAlex\Garage\Vehicle\Ability\MoveAwareTrait;

/**
 * Class Boat
 * @package CheAlex\Garage\Vehicle
 */
class Boat extends AbstractVehicle implements MoveAwareAwareInterface, SwimAwareAwareInterface
{
    use MoveAwareTrait;
    use SwimAwareTrait;
}
