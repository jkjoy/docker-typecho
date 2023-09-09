FROM php:8.1.2-apache
MAINTAINER noahgao "jkjoy@163.com"
RUN apt-get update \
    && apt-get install sqlite3 libsqlite3-dev libmcrypt-dev curl libcurl4-openssl-dev libzip-dev zip --yes \
    && pecl install mcrypt-1.0.5 \
    && docker-php-ext-enable mcrypt \
    && docker-php-ext-install pdo_sqlite \
    && pecl install -o -f redis-5.3.5 \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis 
COPY src/ /var/www/html/
RUN chmod -R 0777 /var/www/html/
EXPOSE 80
