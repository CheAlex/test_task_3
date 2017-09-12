<?php
declare(strict_types=1);

namespace CheAlex\Garage\Vehicle;

use CheAlex\Garage\Vehicle\Ability\FlyAwareAwareInterface;
use CheAlex\Garage\Vehicle\Ability\FlyAwareTrait;
use CheAlex\Garage\Vehicle\Ability\LandingAwareAwareInterface;
use CheAlex\Garage\Vehicle\Ability\LandingAwareTrait;
use CheAlex\Garage\Vehicle\Ability\TakeOffAwareAwareInterface;
use CheAlex\Garage\Vehicle\Ability\TakeOffAwareTrait;

/**
 * Class Helicopter
 * @package CheAlex\Garage\Vehicle
 */
class Helicopter extends AbstractVehicle implements
    TakeOffAwareAwareInterface,
    FlyAwareAwareInterface,
    LandingAwareAwareInterface
{
    use TakeOffAwareTrait;
    use FlyAwareTrait;
    use LandingAwareTrait;
}
