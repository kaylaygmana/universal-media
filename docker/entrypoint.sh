#!/bin/bash
set -e

# Ensure writable directories (mounted volumes may reset ownership)
mkdir -p storage/framework/{cache,sessions,views} storage/logs storage/app/public/berita storage/app/public/sidebar
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Public storage symlink (uploaded photos are served via /storage)
php artisan storage:link || true

php artisan config:cache || true
php artisan view:cache || true

# Disable by setting SKIP_MIGRATIONS=true
if [ "${SKIP_MIGRATIONS}" != "true" ]; then
    php artisan migrate --force || true
fi

# Re-apply ownership after artisan commands (so logs/cache created by root are writable by www-data)
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

exec "$@"
