FROM php:7.4.33-apache
MAINTAINER noahgao "jkjoy@163.com"
RUN apt-get update
RUN apt-get install sqlite3 libsqlite3-dev --yes
RUN docker-php-ext-install mbstring pdo_sqlite
COPY src/ /var/www/html/
EXPOSE 80
