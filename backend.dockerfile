FROM php:8.0-cli

RUN apt-get update && \
    apt-get upgrade -y && \
    php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer && \
    alias composer='php /usr/bin/composer' && \
    apt-get install -y libssl-dev \
      zip unzip \
      make \
      bash && \
    pecl install mongodb && \
    docker-php-ext-enable mongodb

COPY --from=composer:2.1.14 /usr/bin/composer /usr/bin/composer

WORKDIR /backend

COPY ./* .

RUN export PATH=$PATH":/usr/bin" && \
    chmod +x /usr/local/etc/php/conf.d/docker-php-ext-sodium.ini && \
    echo "extension=mongodb.so" >> /usr/local/etc/php/conf.d/docker-php-ext-sodium.ini && \
    chmod +x /usr/bin/composer && \
    composer clearcache && \
    composer install \
            --no-interaction \
            --no-plugins \
            --no-scripts \
            --no-dev \
            --prefer-dist && \
    composer dump-autoload && \
    php artisan optimize:clear

CMD php artisan serve --host 0.0.0.0 --port=8000
