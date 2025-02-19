FROM nginx:stable-alpine

WORKDIR /app

# Create data directory and set permissions during build
RUN mkdir -p /app/data && \
    chown -R nginx:nginx /app

# Install packages
RUN apk --no-cache add \
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
    php83-tidy \
    php83-tokenizer \
    php83-session \
    && mkdir -p /etc/nginx/sites-enabled \
    && rm -rf /var/cache/apk/*

# Copy configuration files
COPY nginx.conf /etc/nginx/nginx.conf
COPY php.ini /etc/php83/php.ini
COPY www.conf /etc/php83/php-fpm.d/www.conf
COPY default /etc/nginx/sites-available/default
COPY start.sh /start.sh
COPY typecho/ /app/

# Set up permissions and symlinks in a single layer
RUN chmod +x /start.sh \
    && chown -R nginx:nginx /app \
    && chmod -R 0755 /app \
    && ln -sf /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default

EXPOSE 80

CMD ["/start.sh"]