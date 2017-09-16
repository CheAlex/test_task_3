<?php

use CheAlex\Di\DiContainerInterface;
use CheAlex\Garage\DataSource\PhpArrayDataSource;
use CheAlex\Garage\Garage;
use CheAlex\Garage\Logger\EchoLogger;
use CheAlex\Garage\Logger\LoggerInterface;
use CheAlex\Garage\VehicleProvider\Factory;
use CheAlex\Garage\VehicleProvider\VehicleProviderInterface;

/** @var DiContainerInterface $di */

$di->set('che_alex.garage.vehicle_provider.factory', function () {
    $fixturesFilePath = getenv('ECOMOTIZE_TASK_VEHICLES_FIXTURES_FILE_PATH');

    $factory = new Factory(
        new PhpArrayDataSource($fixturesFilePath)
    );

    return $factory;
});
$di->set('che_alex.garage.logger.echo_logger', function () {
    return new EchoLogger();
});
$di->set('che_alex.garage.garage', function () {
    /** @var VehicleProviderInterface $vehicleProvider */
    $vehicleProvider = $this->get('che_alex.garage.vehicle_provider.factory');

    /** @var LoggerInterface $logger */
    $logger = $this->get('che_alex.garage.logger.echo_logger');

    $garage = new Garage('Ecomotize garage', $logger);

    foreach ($vehicleProvider->getVehicles() as $vehicle) {
        $garage->addVehicle($vehicle);
    }

    return $garage;
});
