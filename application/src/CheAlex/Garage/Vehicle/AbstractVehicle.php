<?php
declare(strict_types=1);

namespace CheAlex\Garage\Vehicle;

use CheAlex\Garage\Vehicle\Ability\RefuelAwareAwareInterface;
use CheAlex\Garage\Vehicle\Ability\AbilityAwareInterface;
use CheAlex\Garage\Vehicle\Ability\RefuelAwareTrait;
use CheAlex\Garage\Vehicle\Ability\StopAwareAwareInterface;
use CheAlex\Garage\Vehicle\Ability\StopAwareTrait;

/**
 * Class AbstractVehicle
 * @package CheAlex\Garage\Vehicle
 */
abstract class AbstractVehicle implements VehicleInterface, RefuelAwareAwareInterface, StopAwareAwareInterface
{
    use RefuelAwareTrait;
    use StopAwareTrait;

    /**
     * Vehicle name.
     *
     * @var \string
     */
    private $name;

    /**
     * @var \string[]
     */
    private $actions;

    /**
     * AbstractVehicle constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function doRandomLiveAction(): string
    {
        $action = $this->getRandomAction();

        return call_user_func([$this, $action]);
    }

    /**
     * {@inheritdoc}
     */
    public function getType(): string
    {
        $reflection = new \ReflectionClass($this);

        return strtolower($reflection->getShortName());
    }

    /**
     * @return string
     */
    private function getRandomAction(): string
    {
        $actions = $this->getActions();

        return $actions[array_rand($actions)];
    }

    /**
     * @return array
     */
    private function getActions(): array
    {
        if (null === $this->actions) {
            $actions = [];

            $interfaces = class_implements($this);

            foreach ($interfaces as $interface) {
                if (!is_subclass_of($interface, AbilityAwareInterface::class)) {
                    continue;
                }

                $interfaceActions = get_class_methods($interface);

                $actions[] = array_pop($interfaceActions);
            }

            $this->actions = $actions;
        }

        return $this->actions;
    }
}
