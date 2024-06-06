FROM php:8.2.4-fpm-alpine


RUN apk update && apk add --no-cache nginx wget postgresql-dev zlib-dev libzip-dev unzip


RUN mkdir -p /run/nginx


RUN docker-php-ext-install pdo_pgsql pgsql zip


COPY docker/nginx.conf /etc/nginx/nginx.conf



RUN mkdir -p /app
COPY . /app
COPY /src /app

RUN sh -c "wget http://getcomposer.org/composer.phar && chmod a+x composer.phar && mv composer.phar /usr/local/bin/composer"
RUN cd /app && \
    /usr/local/bin/composer install --no-dev --no-plugins --ignore-platform-req=ext-gd 

RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini && \
    sed -i 's/upload_max_filesize = .*/upload_max_filesize = 128M/g' /usr/local/etc/php/php.ini && \
    sed -i 's/post_max_size = .*/post_max_size = 128M/g' /usr/local/etc/php/php.ini && \
    sed -i 's/memory_limit = .*/memory_limit = 512M/g' /usr/local/etc/php/php.ini


# Build argument for service account file
ARG GOOGLE_APPLICATION_CREDENTIALS
COPY ${GOOGLE_APPLICATION_CREDENTIALS} /src/service-account.json


RUN chown -R www-data: /app

CMD sh /app/docker/startup.sh
