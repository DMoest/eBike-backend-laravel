#
# MySQL / SQLite Setup.
# ---------------------
FROM php:8.0-cli

RUN apt-get update \
    && apt-get upgrade -y \
    && apt-get install -y  \
      libssl-dev \
      bash \
      make \
      curl \
      zip \
      unzip \
    && docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && alias composer='php /usr/bin/composer'

WORKDIR /backend

COPY ./* ./

RUN composer clearcache \
    && composer install \
            --no-interaction \
            --no-plugins \
            --no-scripts \
            --no-dev \
            --prefer-dist \
    && composer dump-autoload \
    && php artisan passport:install --force \
    && php artisan passport:keys --force \
    && php artisan vendor:publish --tag=passport-config \
    && php artisan optimize:clear

CMD php artisan serve --host 0.0.0.0 --port=8000



##
## Mongo DB Setup.
##
#FROM php:8.0-cli
#
#RUN apt-get update && \
#    apt-get upgrade -y && \
#    apt-get install -y  \
#      libssl-dev \
#      zip unzip \
#      make \
#      curl \
#      bash && \
#    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
#    alias composer='php /usr/bin/composer'
##    pecl install mongodb && \
##    docker-php-ext-enable mongodb
#
##COPY --from=composer:2.1.14 /usr/bin/composer /usr/bin/composer
#
#WORKDIR /backend
#
#COPY ./* .
#
#RUN export PATH=$PATH":/usr/bin" && \
##    chmod +x /usr/local/etc/php/conf.d/docker-php-ext-sodium.ini && \
##    echo "extension=mongodb.so" >> /usr/local/etc/php/conf.d/docker-php-ext-sodium.ini && \
#    chmod +x /usr/bin/composer && \
#    composer clearcache && \
#    composer install \
#            --no-interaction \
#            --no-plugins \
#            --no-scripts \
#            --no-dev \
#            --prefer-dist && \
#    composer dump-autoload && \
#    php artisan optimize:clear
#
#CMD php artisan serve --host 0.0.0.0 --port=8000
