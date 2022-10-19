# ./docker/php/Dockerfile
FROM php:8.0.3-fpm-alpine

RUN docker-php-ext-install pdo_mysql

RUN apk add --no-cache bash mysql-client

RUN apk add --no-cache \
        $PHPIZE_DEPS \
        openssl-dev

RUN pecl install redis-5.3.2 \
    && pecl install xdebug \
    && docker-php-ext-enable redis xdebug \
    && docker-php-ext-install bcmath sockets

RUN apk update && \
apk add -u \
zlib-dev \
yarn

RUN apk update && apk upgrade && \
    apk add --no-cache bash git openssh

RUN apk add --no-cache --virtual build-essentials \
    icu-dev icu-libs zlib-dev g++ make automake autoconf libzip-dev \
    libpng-dev libwebp-dev libjpeg-turbo-dev freetype-dev && \
    docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp && \
    docker-php-ext-install gd && \
    docker-php-ext-install zip

RUN apk add --no-cache \
        wkhtmltopdf \
        xvfb \
        ttf-dejavu ttf-droid ttf-freefont ttf-liberation \
    ;

RUN ln -s /usr/bin/wkhtmltopdf /usr/local/bin/wkhtmltopdf;
RUN chmod +x /usr/local/bin/wkhtmltopdf;

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ENV XDG_RUNTIME_DIR=/tmp

ENV PHP_EXTRA_CONFIGURE_ARGS --enable-fpm --with-fpm-user=www-data --with-fpm-group=www-data --disable-cgi

RUN addgroup -g 1000 -S 1000 && \
addgroup www-data 1000

VOLUME /home/app
WORKDIR /home/app

RUN chown -R www-data:www-data /var/www
RUN chown -R www-data:www-data /usr/bin/wkhtmltopdf

RUN PATH=$PATH:/home8/app/vendor/bin:bin