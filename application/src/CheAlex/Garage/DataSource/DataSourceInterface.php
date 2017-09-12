<?php
declare(strict_types=1);

namespace CheAlex\Garage\DataSource;

/**
 * Interface DataSourceInterface
 * @package CheAlex\Garage\DataSource
 */
interface DataSourceInterface
{
    /**
     * @return array
     */
    public function getData(): array;
}
