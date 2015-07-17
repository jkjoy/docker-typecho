FROM php:5.6-apache
MAINTAINER noahgao "ziheng1719@163.com"
RUN apt-get update
RUN apt-get install sqlite3 libsqlite3-dev --yes
RUN docker-php-ext-install mbstring pdo_mysql pdo_sqlite
COPY src/ /var/www/html/
EXPOSE 80