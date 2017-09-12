<?php
declare(strict_types=1);

namespace CheAlex\Garage\Logger;

/**
 * Interface LoggerInterface
 * @package CheAlex\Garage\Logger
 */
interface LoggerInterface
{
    /**
     * Log message.
     *
     * @param string $message
     */
    public function log(string $message): void;
}
