FROM webdevops/php-nginx:8.2

WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN php artisan key:generate

RUN php artisan storage:link

RUN npm install && npm run build || true

CMD php artisan migrate --force && supervisord
