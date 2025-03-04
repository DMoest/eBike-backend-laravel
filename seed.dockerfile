FROM php:8.0-cli

RUN curl -sS https://getcomposer.org/installer​ | php -- \
    --install-dir=/usr/local/bin --filename=composer &&\
    apt-get update &&\
    apt-get install libssl-dev &&\
    apt-get install zip unzip &&\
    pecl install mongodb &&\
    echo "extension=mongodb.so" >> /usr/local/etc/php/conf.d/docker-php-ext-sodium.ini
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /backend

COPY ./* .

RUN make clean-all install

CMD php artisan migrate:fresh --seed
