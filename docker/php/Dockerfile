FROM php:7.1.8

# Base install
RUN apt-get update && \
    apt-get install -y curl git zip unzip && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

VOLUME /application
