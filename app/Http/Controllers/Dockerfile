# ---------- Stage 1: Build PHP Dependencies ----------
FROM composer:2 AS vendor

WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader

# ---------- Stage 2: Build Node Assets (optional but safe) ----------
FROM node:18 AS frontend

WORKDIR /app
COPY package.json package-lock.json ./
RUN npm install
COPY . .
RUN npm run build || echo "No frontend build step"

# ---------- Stage 3: Final Image ----------
FROM php:8.2-fpm

# Install system packages
RUN apt-get update && apt-get install -y \
    git curl zip unzip nginx supervisor libpq-dev libzip-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip

# Copy project files
WORKDIR /var/www/html
COPY . .

# Copy vendor from stage 1
COPY --from=vendor /app/vendor ./vendor

# Copy built frontend
COPY --from=frontend /app/public ./public

# Permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Copy Nginx config
COPY docker/nginx.conf /etc/nginx/sites-enabled/default

# Supervisor to run Nginx + PHP-FPM
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

EXPOSE 80

CMD ["/usr/bin/supervisord"]
