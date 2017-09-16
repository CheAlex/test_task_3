<?php
declare(strict_types=1);

namespace CheAlex\Di;

/**
 * Interface DependencyInjectionContainer
 * @package CheAlex\Di
 */
interface DiContainerInterface
{
    /**
     * @param string $serviceId
     * @return mixed
     */
    public function get(string $serviceId);

    /**
     * @param string $serviceId
     * @param \Closure $definition
     * @return mixed
     */
    public function set(string $serviceId, \Closure $definition);

    /**
     * @param string $serviceId
     * @return bool
     */
    public function has(string $serviceId): bool;
}
