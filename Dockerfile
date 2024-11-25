FROM nginx:stable-alpine

LABEL maintainer="jkjoy <imsunpw@gmail.com>"

ENV DEBIAN_FRONTEND noninteractive
ENV DOCUMENT_ROOT /usr/share/nginx/html

# Install necessary packages
RUN apk add --no-cache \
    wget \
    unzip \
    php7 \
    php7-fpm \
    php7-pdo \
    php7-sqlite3 \
    php7-zip \
    php7-curl \
    php7-gd \
    php7-intl \
    php7-pear \
    php7-imagick \
    php7-imap \
    php7-mcrypt \
    php7-ps \
    php7-pspell \
    php7-tidy \
    php7-xmlrpc \
    php7-xsl \
    php7-mbstring \
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
RUN sed -i -e "s/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/g" /etc/php7/php.ini \
    && sed -i -e "s/upload_max_filesize\s*=\s*12M/upload_max_filesize = 100M/g" /etc/php7/php.ini \
    && sed -i -e "s/post_max_size\s*=\s*80M/post_max_size = 100M/g" /etc/php7/php.ini \
    && sed -i -e "s/;catch_workers_output\s*=\s*yes/catch_workers_output = yes/g" /etc/php7/php-fpm.d/www.conf \
    && sed -i -e "s/;listen.mode = 0660/listen.mode = 0666/g" /etc/php7/php-fpm.d/www.conf

# Set permissions
RUN chown -R www-data:www-data ${DOCUMENT_ROOT} \
    && chmod -R 755 ${DOCUMENT_ROOT}

# Copy nginx configuration
COPY default /etc/nginx/sites-available/default
RUN mkdir -p /etc/nginx/sites-enabled \
    && ln -s /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default

EXPOSE 80 443

CMD php-fpm7 && nginx -g "daemon off;"
