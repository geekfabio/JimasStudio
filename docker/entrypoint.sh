#!/bin/sh
set -e

# Ensure Laravel directories are writable
mkdir -p storage/framework/{views,cache,sessions} storage/logs bootstrap/cache database
[ -f database/database.sqlite ] || touch database/database.sqlite
chmod -R 775 storage bootstrap/cache database

# Run Laravel optimizations, migrations and seeders
php artisan storage:link --force || true
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
php artisan migrate --force || true
php artisan db:seed --force || true

# Start supervisor (nginx + php-fpm)
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
