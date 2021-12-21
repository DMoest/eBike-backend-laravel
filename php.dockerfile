FROM php:8-fpm-alpine

ENV PHPGROUP=ebike
ENV PHPUSER=ebike

RUN adduser -g ${PHPGROUP} -s /bin/sh -D ${PHPUSER} && \
    sed -i "s/user = www-data/user = ${PHPUSER}/g" /usr/local/etc/php-fpm.d/www.conf && \
    sed -i "s/user = www-data/group = ${PHPGROUP}/g" /usr/local/etc/php-fpm.d/www.conf && \
    mkdir -p /var/www/html/public

CMD [ "php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R" ]
