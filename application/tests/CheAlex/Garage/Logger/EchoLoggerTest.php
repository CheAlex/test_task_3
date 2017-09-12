<?php
declare(strict_types=1);

namespace Tests\CheAlex\Garage\Vehicle;

use CheAlex\Garage\Logger\EchoLogger;
use PHPUnit\Framework\TestCase;

/**
 * Class EchoLoggerTest
 * @package Tests\CheAlex\Garage\Vehicle
 */
class EchoLoggerTest extends TestCase
{
    /**
     * @var EchoLogger
     */
    private $logger;

    protected function setUp()
    {
        $this->logger = new EchoLogger();
    }

    /**
     * @param string $message
     *
     * @dataProvider logDataProvider
     */
    public function testLog(string $message): void
    {
        $this->expectOutputString($message . PHP_EOL);
        $this->logger->log($message);
    }

    /**
     * @return array
     */
    public function logDataProvider(): array
    {
        return [
            ['message 1'],
            ['message 2'],
            ['message 3'],
        ];
    }
}
