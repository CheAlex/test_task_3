#!/bin/sh

docker-compose stop
docker-compose rm -f
docker-compose up -d

docker exec -i ecomitize_task.php_1 composer install
