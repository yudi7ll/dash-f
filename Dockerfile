FROM php:7.4-fpm-alpine

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/

RUN install-php-extensions pdo_mysql zip gd

RUN apk update && apk upgrade
RUN apk add npm

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

# configure file owner permissions
RUN adduser -DG www-data -u 1000 yudi
RUN chown -R yudi:www-data /var/www/html

# clean up
RUN rm /tmp/* -rf
