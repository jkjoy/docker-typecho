FROM php:7.4.33-apache
MAINTAINER noahgao "jkjoy@163.com"
RUN apt-get update \
    && apt-get install sqlite3 libsqlite3-dev libmcrypt-dev  --yes \
    && pecl install mcrypt-1.0.5 \
    && docker-php-ext-enable mcrypt \
    && docker-php-ext-install pdo_sqlite \
    && pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis 
COPY src/ /var/www/html/
RUN chmod -R 755 /var/www/html/
EXPOSE 80
