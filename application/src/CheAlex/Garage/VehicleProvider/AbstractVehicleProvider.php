<?php
declare(strict_types=1);

namespace CheAlex\Garage\VehicleProvider;

use CheAlex\Garage\Vehicle\VehicleInterface;
use CheAlex\Garage\DataSource\DataSourceInterface;

/**
 * Class AbstractVehicleProvider
 * @package CheAlex\Garage\VehicleProvider
 */
abstract class AbstractVehicleProvider implements VehicleProviderInterface
{
    /**
     * @var DataSourceInterface
     */
    private $dataSource;

    /**
     * AbstractVehicleProvider constructor.
     * @param DataSourceInterface $dataSource
     */
    public function __construct(DataSourceInterface $dataSource)
    {
        $this->dataSource = $dataSource;
    }

    /**
     * {@inheritdoc}
     */
    public function getVehicles(): ?\Generator
    {
        $vehiclesData = $this->dataSource->getData();

        foreach ($vehiclesData as $vehicleDataItem) {
            yield $this->createVehicle($vehicleDataItem);
        }
    }

    /**
     * @param array $data
     * @return VehicleInterface
     */
    abstract protected function createVehicle(array $data): VehicleInterface;
}
