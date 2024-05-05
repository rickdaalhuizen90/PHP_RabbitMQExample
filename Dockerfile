FROM php:8.3-cli

COPY ./src composer.json composer.lock /app/
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /app

RUN apt-get update && apt-get install -y unzip

RUN docker-php-ext-install sockets

RUN composer install --prefer-dist --no-dev

EXPOSE 8000

ENTRYPOINT ["php", "-S", "0.0.0.0:8000", "index.php"]