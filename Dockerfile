FROM php:8.2.4-fpm-alpine

# Update apk and add necessary packages
RUN apk update && apk add --no-cache nginx wget postgresql-dev php5-gd php5-intl php5-xsl

# Install PHP extensions for PostgreSQL
RUN docker-php-ext-install pdo_pgsql pgsql

# Create necessary directories
RUN mkdir -p /run/nginx

# Copy nginx configuration
COPY docker/nginx.conf /etc/nginx/nginx.conf

# Create app directory and copy application files
RUN mkdir -p /app
COPY . /app
COPY ./src /app

# Install Composer
RUN sh -c "wget http://getcomposer.org/composer.phar && chmod a+x composer.phar && mv composer.phar /usr/local/bin/composer"

# Install PHP dependencies
RUN cd /app && /usr/local/bin/composer install --no-dev

# Set permissions
RUN chown -R www-data: /app

# Command to run the application
CMD sh /app/docker/startup.sh
