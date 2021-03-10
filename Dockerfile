FROM php:7.4-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql

COPY ./api /var/www/html