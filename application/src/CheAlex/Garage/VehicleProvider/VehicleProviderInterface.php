<?php
declare(strict_types=1);

namespace CheAlex\Garage\VehicleProvider;

use CheAlex\Garage\Vehicle\VehicleInterface;
use CheAlex\Garage\Exception\Exception;

/**
 * Interface VehicleProviderInterface
 * @package CheAlex\Garage\VehicleProvider
 */
interface VehicleProviderInterface
{
    /**
     * @return \Generator|VehicleInterface[]
     * @throws Exception
     */
    public function getVehicles(): ?\Generator;
}
