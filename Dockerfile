FROM nginx:stable-alpine

LABEL maintainer="jkjoy <imsunpw@gmail.com>"

ENV DEBIAN_FRONTEND noninteractive
ENV DOCUMENT_ROOT /usr/share/nginx/html

# Update package list and install necessary packages
RUN apk --update add --no-cache \
    nginx \
    wget \
    unzip \
    php83 \
    php83-fpm \
    php83-pdo \
    php83-sqlite3 \
    php83-zip \
    php83-curl \
    php83-gd \
    php83-intl \
    php83-pear \
    php83-imagick \
    php83-imap \
    php83-mcrypt \
    php83-ps \
    php83-pspell \
    php83-tidy \
    php83-xmlrpc \
    php83-xsl \
    php83-mbstring \
    git \
    && rm -rf /var/cache/apk/*

WORKDIR ${DOCUMENT_ROOT}

# Download and extract Typecho
RUN wget https://github.com/typecho/typecho/releases/latest/download/typecho.zip \
    && unzip typecho.zip \
    && rm typecho.zip \
    && git clone https://github.com/jzwalk/TeStore.git /usr/plugins/TeStore

# Configure nginx
RUN sed -i -e"s/keepalive_timeout\s*65/keepalive_timeout 2/" /etc/nginx/nginx.conf \
    && sed -i -e"s/keepalive_timeout 2/keepalive_timeout 2;\n\tclient_max_body_size 10m/" /etc/nginx/nginx.conf \
    && sed -i -e "s|include /etc/nginx/conf.d/\*.conf|include /etc/nginx/sites-enabled/\*|g" /etc/nginx/nginx.conf \
    && echo "daemon off;" >> /etc/nginx/nginx.conf

# Configure php-fpm
RUN sed -i -e "s/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/g" /etc/php83/php.ini \
    && sed -i -e "s/upload_max_filesize\s*=\s*12M/upload_max_filesize = 100M/g" /etc/php83/php.ini \
    && sed -i -e "s/post_max_size\s*=\s*80M/post_max_size = 100M/g" /etc/php83/php.ini \
    && sed -i -e "s/;catch_workers_output\s*=\s*yes/catch_workers_output = yes/g" /etc/php83/php-fpm.d/www.conf \
    && sed -i -e "s/;listen.mode = 0660/listen.mode = 0666/g" /etc/php83/php-fpm.d/www.conf

# Set permissions
RUN chown -R www-data:www-data ${DOCUMENT_ROOT} \
    && chmod -R 755 ${DOCUMENT_ROOT}

# Copy nginx configuration
COPY default /etc/nginx/sites-available/default
RUN mkdir -p /etc/nginx/sites-enabled \
    && ln -s /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default

EXPOSE 80 443

CMD ["sh", "-c", "php-fpm83 && nginx -g 'daemon off;'"]
