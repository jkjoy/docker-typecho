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
    php83-xsl \
    php83-mbstring \
    php83-dom \
    php83-json \
    php83-openssl \
    php83-pdo_sqlite \
    php83-zlib \
    php83-fileinfo \
    php83-opcache \
    php83-imap \
    php83-exif \
    php83-pecl-imagick \
    php83-ctype \ 
    php83-intl \
    php83-tidy \
    php83-tokenizer \
    php83-session \
    && rm -rf /var/cache/apk/*

COPY typecho/ /app

# Set permissions
RUN chown -R nginx:nginx /app \
    && chmod -R 755 /app 

# Copy nginx configuration
COPY nginx.conf /etc/nginx/nginx.conf
COPY php.ini /etc/php83/php.ini
COPY www.conf /etc/php83/php-fpm.d/www.conf
COPY default /etc/nginx/sites-available/default
RUN mkdir -p /etc/nginx/sites-enabled \
    && ln -s /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default

# Copy and setup start script
COPY start.sh /start.sh
RUN chmod +x /start.sh

EXPOSE 80

CMD ["/start.sh"]
