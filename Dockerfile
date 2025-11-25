# Use official PHP 8.2 image with FPM
FROM php:8.2-fpm

# Install required system dependencies
RUN apt-get update && apt-get install -y \
    nginx \
    git \
    zip \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions
RUN chmod -R 777 storage bootstrap/cache

# Copy nginx config
COPY docker/nginx.conf /etc/nginx/sites-enabled/default

# Expose port 80
EXPOSE 80

CMD service nginx start && php-fpm
