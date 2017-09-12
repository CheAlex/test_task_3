#!/bin/sh

docker exec -i ecomitize_task.php_1 php vendor/phpunit/phpunit/phpunit -c phpunit.xml
