<?php
declare(strict_types=1);

namespace Tests\CheAlex\Di;

use CheAlex\Di\DiContainer;
use CheAlex\Di\Exception\Exception;
use PHPUnit\Framework\TestCase;

class DiContainerTest extends TestCase
{
    /**
     * @var DiContainer
     */
    private $diContainer;

    /**
     * @inheritDoc
     */
    protected function setUp()
    {
        $this->diContainer = new DiContainer();
    }

    public function testSet_successful()
    {
        $this->diContainer->set('test_service', function () {
            return new \stdClass();
        });

        $this->assertTrue($this->diContainer->has('test_service'));
    }

    public function testGet_undefinedService()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Service "undefined_service" is undefined.');

        $this->diContainer->get('undefined_service');
    }

    public function testGet_validService()
    {
        $this->diContainer->set('test_service', function () {
            return new \stdClass();
        });

        $service = $this->diContainer->get('test_service');

        $this->assertInstanceOf(\stdClass::class, $service);
    }

    public function testLoadFromFile_validFile()
    {
        $this->diContainer->loadFromFile(__DIR__.'/fixtures/services.php');

        $this->assertTrue($this->diContainer->has('service_from_file'));
    }

    public function testLoadFromFile_notExistFile()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessageRegExp('#/fixtures/not_exist_file.php" is not exists or is not readable.$#');

        $this->diContainer->loadFromFile(__DIR__.'/fixtures/not_exist_file.php');
    }
}
