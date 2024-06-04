FROM php:8.2.4-fpm-alpine


RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

RUN apk update && apk add --no-cache nginx wget postgresql-dev

RUN mkdir -p /run/nginx


RUN docker-php-ext-install pdo_pgsql pgsql

COPY docker/nginx.conf /etc/nginx/nginx.conf



RUN mkdir -p /app
COPY . /app
COPY /src /app

RUN sh -c "wget http://getcomposer.org/composer.phar && chmod a+x composer.phar && mv composer.phar /usr/local/bin/composer"
RUN cd /app && \
    /usr/local/bin/composer install --no-dev --no-plugins


RUN chown -R www-data: /app

CMD sh /app/docker/startup.sh
