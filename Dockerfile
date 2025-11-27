FROM php:8.2-apache  # Compatible with Laravel 10

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql zip gd exif

# Enable Apache modules for Laravel routes
RUN a2enmod rewrite headers

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Install Node.js and build frontend assets (Vite for Laravel 10)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && npm ci --only=production \
    && npm run build

# Laravel optimizations (caches configs/routes/views; APP_KEY from env)
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Set permissions for storage/logs
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 755 storage bootstrap/cache

# Expose port for Render
EXPOSE 8080

# Start Apache server
CMD ["apache2-foreground"]