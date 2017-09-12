<?php
declare(strict_types=1);

namespace CheAlex\Garage\Vehicle;

use CheAlex\Garage\Vehicle\Ability\MoveAwareAwareInterface;
use CheAlex\Garage\Vehicle\Ability\MoveAwareTrait;

/**
 * Class Truck
 * @package CheAlex\Garage\Vehicle
 */
class Truck extends AbstractVehicle implements MoveAwareAwareInterface
{
    use MoveAwareTrait;
}
