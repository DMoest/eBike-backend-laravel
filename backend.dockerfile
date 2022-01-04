FROM php:8-fpm-alpine

RUN apk update && \
    apk upgrade && \
    apk add bash-completion \
      php8-json \
      php8-openssl \
      php8-tokenizer \
      php8-pdo \
      php8-pdo_mysql \
      zip \
      unzip \
      make && \
    docker-php-ext-install mysqli pdo pdo_mysql

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \

WORKDIR /backend

COPY ./* .

RUN make clean-all install

CMD php artisan optimize:clear && \
    php artisan serve --host 0.0.0.0 --port=8000


#FROM php:8.0-cli
#
#RUN apt-get update && \
#    apt-get upgrade -y && \
#    apt-get install -y  \s
#      libssl-dev \
#      zip unzip \
#      make \
#      curl \
#      bash && \
#    docker-php-ext-install mysqln pdo pdo-mysql && \
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
