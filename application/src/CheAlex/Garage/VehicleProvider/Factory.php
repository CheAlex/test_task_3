<?php
declare(strict_types=1);

namespace CheAlex\Garage\VehicleProvider;

use CheAlex\Garage\Vehicle\VehicleInterface;
use CheAlex\Garage\Vehicle\Car;
use CheAlex\Garage\Vehicle\Boat;
use CheAlex\Garage\Vehicle\Helicopter;
use CheAlex\Garage\Vehicle\Truck;
use CheAlex\Garage\Exception\Exception;

/**
 * Class Factory
 * @package CheAlex\Garage\VehicleProvider
 */
class Factory extends AbstractVehicleProvider
{
    /**
     * {@inheritdoc}
     */
    protected function createVehicle(array $data): VehicleInterface
    {
        if (!isset($data['type']) || strlen($data['type']) === 0) {
            throw new Exception('Data with key "type" not exist or zero length.');
        }

        if (!isset($data['name']) || strlen($data['name']) === 0) {
            throw new Exception('Data with key "name" not exist or zero length.');
        }

        $vehicle = null;

        switch ($data['type']) {
            case 'car':
                $vehicle = new Car($data['name']);
                break;
            case 'boat':
                $vehicle = new Boat($data['name']);
                break;
            case 'helicopter':
                $vehicle = new Helicopter($data['name']);
                break;
            case 'truck':
                $vehicle = new Truck($data['name']);
                break;
            default:
                throw new Exception(sprintf('Undefined vehicle type "%s"', $data['type']));
                break;
        }

        return $vehicle;
    }
}
