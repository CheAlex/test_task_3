<?php
declare(strict_types=1);

namespace CheAlex\Garage\Logger;

/**
 * Class EchoLogger
 * @package CheAlex\Garage\Logger
 */
class EchoLogger implements LoggerInterface
{
    /**
     * {@inheritdoc}
     */
    public function log(string $message): void
    {
        echo $message . PHP_EOL;
    }
}
