<?php

namespace CheAlex\Di;

use CheAlex\Di\Exception\Exception;

/**
 * Class DiContainer
 * @package CheAlex\Di
 */
class DiContainer implements DiContainerInterface
{
    /**
     * @var array
     */
    private $services = [];

    /**
     * @var \Closure[]
     */
    private $definitions = [];

    /**
     * {@inheritdoc}
     */
    public function get(string $serviceId)
    {
        if (!array_key_exists($serviceId, $this->services)) {
            if (!$this->has($serviceId)) {
                throw new Exception(sprintf('Service "%s" is undefined.'));
            }

            $this->services[$serviceId] = $this->definitions[$serviceId]->call($this);
        }

        return $this->services[$serviceId];
    }

    /**
     * {@inheritdoc}
     */
    public function set(string $serviceId, \Closure $definition)
    {
        $this->definitions[$serviceId] = $definition;
    }

    /**
     * {@inheritdoc}
     */
    public function has(string $serviceId): bool
    {
        return array_key_exists($serviceId, $this->definitions);
    }

    /**
     * @param string $filePath
     * @throws Exception
     */
    public function loadFromFile(string $filePath)
    {
        if (!is_readable($filePath)) {
            throw new Exception(sprintf('File "%s" not exists or not readable'));
        }

        $di = $this;

        require $filePath;
    }
}
