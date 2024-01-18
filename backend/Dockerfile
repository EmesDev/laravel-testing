FROM php:8.2

RUN apt-get update && apt-get install -y \
    libpq-dev \
    git \
    && docker-php-ext-install pdo pdo_pgsql

WORKDIR /var/www/html



RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# RUN php artisan key:generate

COPY . .

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache


CMD php artisan serve --host=0.0.0.0  --port=8080


