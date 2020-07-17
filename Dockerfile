FROM php:7.4-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql
RUN adduser -DG www-data -u 1000 yudi
RUN chown -R yudi:www-data /var/www/html
