FROM nginx:stable-alpine

WORKDIR /app

# Update package list and install necessary packages
RUN apk --update add --no-cache \
    php83 \
    php83-fpm \
    php83-pdo \
    php83-sqlite3 \
    php83-zip \
    php83-curl \
    php83-gd \
    php83-intl \
 #   php83-swoole \
    php83-tidy \
    php83-xsl \
    php83-mbstring \
    php83-dom \
    php83-json \
    php83-openssl \
    php83-pdo_sqlite \
    php83-zlib \
    php83-shmop \
    php83-fileinfo \
    php83-opcache \
    php83-imap \
    php83-redis \
    php83-exif \
    php83-apcu \
    php83-tokenizer \
    php83-bz2 \
    php83-ctype \
    && rm -rf /var/cache/apk/*

COPY typecho/ /app

# Set permissions
RUN chown -R nginx:nginx /app \
    && chmod -R 755 /app 


# Configure nginx
RUN sed -i -e"s/keepalive_timeout\s*65/keepalive_timeout 2/" /etc/nginx/nginx.conf \
    && sed -i -e"s/keepalive_timeout 2/keepalive_timeout 2;\n\tclient_max_body_size 10m/" /etc/nginx/nginx.conf \
    && sed -i -e "s|include /etc/nginx/conf.d/\*.conf|include /etc/nginx/sites-enabled/\*|g" /etc/nginx/nginx.conf

# Configure php-fpm
RUN sed -i -e "s/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/g" /etc/php83/php.ini \
    && sed -i -e "s/upload_max_filesize\s*=\s*12M/upload_max_filesize = 100M/g" /etc/php83/php.ini \
    && sed -i -e "s/post_max_size\s*=\s*80M/post_max_size = 100M/g" /etc/php83/php.ini \
    && sed -i -e "s/;catch_workers_output\s*=\s*yes/catch_workers_output = yes/g" /etc/php83/php-fpm.d/www.conf \
    && sed -i -e "s/;listen.mode = 0660/listen.mode = 0666/g" /etc/php83/php-fpm.d/www.conf \
    && sed -i -e "s|listen = 127.0.0.1:9000|listen = /run/php-fpm83.sock|g" /etc/php83/php-fpm.d/www.conf \
    && sed -i -e "s|;listen.owner = nobody|listen.owner = nginx|g" /etc/php83/php-fpm.d/www.conf \
    && sed -i -e "s|;listen.group = nobody|listen.group = nginx|g" /etc/php83/php-fpm.d/www.conf \
    && sed -i -e "s|user = nobody|user = nginx|g" /etc/php83/php-fpm.d/www.conf \
    && sed -i -e "s|group = nobody|group = nginx|g" /etc/php83/php-fpm.d/www.conf \
    && sed -i 's/;extension=ctype/extension=ctype/' /etc/php83/php.ini \
    && sed -i 's/;extension=tokenizer/extension=tokenizer/' /etc/php83/php.ini

# Copy nginx configuration
COPY default /etc/nginx/sites-available/default
RUN mkdir -p /etc/nginx/sites-enabled \
    && ln -s /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default

# Copy and setup start script
COPY start.sh /start.sh
RUN chmod +x /start.sh

EXPOSE 80 443

CMD ["/start.sh"]