FROM alpine:3.16.0

WORKDIR /var/www/html

EXPOSE 80

# install curl/git/nginx/php
# libpq-dev : for pgsql php extention
RUN apk add \
    curl \
    nginx \
    libpq-dev \
    php81 \
    php81-fpm \
    php81-curl \
    php81-pgsql \
    php81-pdo_pgsql \
    php81-pdo_mysql \
    php81-pdo \
    php81-zip \
    php81-fileinfo \
    php81-json \
    php81-xml \
    php81-xmlwriter \
    php81-xmlreader \
    php81-simplexml\
    php81-dom \
    php81-openssl \
    php81-soap \
    php81-opcache \
    php81-phar \
    php81-iconv \
    php81-tokenizer \
    php81-mbstring \
    php81-gd \
    php81-session\
    && rm -rf /var/cache/apk/*

# Install Node.js and npm using NodeSource
RUN apk add --no-cache nodejs npm

# nginx configurations
COPY docker/configs/nginx/nginx.conf /etc/nginx/
COPY docker/configs/nginx/http.d/default.conf /etc/nginx/http.d

# install composer
RUN ln /usr/bin/php81 /usr/bin/php
# --> download composer-setup.php
RUN curl 'https://getcomposer.org/installer' -o 'composer-setup.php'

# --> generate composer.phar & remove composer-setup.php
RUN php composer-setup.php && rm composer-setup.php
# --> move composer.phar to /usr/local/bin/composer (add the composer command)
RUN mv composer.phar /usr/local/bin/composer

# install the app dependencies
COPY ./src .
RUN composer update
RUN chown -R nginx:nginx /var/www/html/storage
RUN chown -R nginx:nginx /var/www/html/bootstrap

# CMD
CMD sh -c 'php-fpm81 && nginx -g "daemon off;"'
