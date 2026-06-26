# syntax=docker/dockerfile:1.4

# Stage 1: Build frontend assets
FROM node:22-alpine AS assets

WORKDIR /app

COPY package*.json ./
RUN npm ci --no-audit --no-fund

COPY . .
RUN npm run build

# Stage 2: PHP runtime with Nginx
FROM php:8.3-fpm-alpine AS runtime

# Install system dependencies
RUN apk add --no-cache \
    nginx \
    supervisor \
    git \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    curl \
    ca-certificates \
    sqlite \
    sqlite-dev \
    && docker-php-ext-install \
    pdo \
    pdo_sqlite \
    bcmath \
    gd \
    zip \
    opcache

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Configure PHP for production
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
COPY docker/php.ini "$PHP_INI_DIR/conf.d/99-laravel.ini"

WORKDIR /var/www/html

# Copy application files
COPY . .
COPY --from=assets /app/public/build ./public/build

# Install PHP dependencies (no dev) — try dist first, fallback to source if GitHub zipball fails
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV COMPOSER_NO_AUDIT=1
ENV COMPOSER_PROCESS_TIMEOUT=600
RUN (composer install --no-dev --no-interaction --no-progress --optimize-autoloader --no-scripts --prefer-dist || \
    composer install --no-dev --no-interaction --no-progress --optimize-autoloader --no-scripts --prefer-source) && \
    php artisan package:discover --ansi && \
    composer clear-cache

# Set permissions for Laravel
RUN mkdir -p storage/framework/{views,cache,sessions} storage/logs bootstrap/cache database && \
    touch database/database.sqlite && \
    chmod -R 775 storage bootstrap/cache database && \
    chown -R www-data:www-data storage bootstrap/cache database

# Copy configuration files
COPY docker/nginx.conf /etc/nginx/http.d/default.conf
COPY docker/php-fpm.conf /usr/local/etc/php-fpm.d/zz-laravel.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Health check
HEALTHCHECK --interval=30s --timeout=5s --start-period=15s --retries=3 \
    CMD curl -f http://localhost:80/up || exit 1

EXPOSE 80

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
