<?php

use CheAlex\Di\DiContainerInterface;

/** @var DiContainerInterface $di */

$di->set('service_from_file', function () {
    return new \stdClass();
});
