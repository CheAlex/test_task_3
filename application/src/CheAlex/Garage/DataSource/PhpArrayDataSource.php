<?php
declare(strict_types=1);

namespace CheAlex\Garage\DataSource;

use CheAlex\Garage\Exception\Exception;

/**
 * Class PhpArrayDataSource
 * @package CheAlex\Garage\DataSource
 */
class PhpArrayDataSource implements DataSourceInterface
{
    /**
     * @var string
     */
    private $filePath;

    /**
     * @var array
     */
    private $data;

    /**
     * @var bool
     */
    private $initialized;

    /**
     * PhpVehicleSource constructor.
     * @param string $filePath
     */
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function getData(): array
    {
        if (!$this->initialized) {
            if (!is_readable($this->filePath)) {
                throw new Exception(
                    sprintf('File "%s" not exist or not readable.', $this->filePath)
                );
            }

            $data = require $this->filePath;

            if (!is_array($data)) {
                throw new Exception(
                    sprintf('File "%s" return not array value.', $this->filePath)
                );
            }

            $this->data = $data;
            $this->initialized = true;
        }

        return $this->data;
    }
}
