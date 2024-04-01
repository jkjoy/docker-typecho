FROM nginx:latest
MAINTAINER jkjoy <imsunpw@gmail.com>

ENV DEBIAN_FRONTEND noninteractive

ENV DOCUMENT_ROOT /usr/share/nginx/html

#Install nginx php-fpm php-pdo unzip curl  
RUN apt update && apt -y install wget unzip lsb-release apt-transport-https ca-certificates 
RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/php.list
RUN apt update && apt -y install php7.4 php7.4-fpm php7.4-zip  apt-utils php7.4-curl php7.4-gd php7.4-intl php-pear php7.4-imagick php7.4-imap php7.4-mcrypt php7.4-ps php7.4-pspell php7.4-sqlite php7.4-tidy php7.4-xmlrpc php7.4-xsl php7.4-mbstring git 
WORKDIR ${DOCUMENT_ROOT}
RUN rm -rf ${DOCUMENT_ROOT}/*
RUN wget https://github.com/typecho/typecho/releases/latest/download/typecho.zip && unzip typecho.zip
RUN rm -rf typecho.zip
RUN git clone https://github.com/jzwalk/TeStore.git /usr/plugins/TeStore

# nginx config
RUN sed -i -e"s/keepalive_timeout\s*65/keepalive_timeout 2/" /etc/nginx/nginx.conf
RUN sed -i -e"s/keepalive_timeout 2/keepalive_timeout 2;\n\tclient_max_body_size 10m/" /etc/nginx/nginx.conf
RUN sed -i -e "s|include /etc/nginx/conf.d/\*.conf|include /etc/nginx/sites-enabled/\*|g" /etc/nginx/nginx.conf
RUN echo "daemon off;" >> /etc/nginx/nginx.conf

# php-fpm config
RUN sed -i -e "s/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/g" /etc/php/7.4/fpm/php.ini
RUN sed -i -e "s/upload_max_filesize\s*=\s*12M/upload_max_filesize = 100M/g" /etc/php/7.4/fpm/php.ini
RUN sed -i -e "s/post_max_size\s*=\s*80M/post_max_size = 100M/g" /etc/php/7.4/fpm/php.ini
RUN sed -i -e "s/;catch_workers_output\s*=\s*yes/catch_workers_output = yes/g" /etc/php/7.4/fpm/pool.d/www.conf
RUN sed -i -e "s/;listen.mode = 0660/listen.mode = 0666/g" /etc/php/7.4/fpm/pool.d/www.conf

RUN chown -R www-data:www-data ${DOCUMENT_ROOT}
RUN chmod -R 755 ${DOCUMENT_ROOT}
COPY default /etc/nginx/sites-available/default
RUN mkdir -p /etc/nginx/sites-enabled
RUN ln -s /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default

EXPOSE 80
EXPOSE 443

CMD service php7.4-fpm start && nginx
