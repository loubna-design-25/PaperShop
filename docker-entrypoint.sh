#!/bin/sh
set -e

# ── Generate application key if not already set ───────────────
if [ -z "$APP_KEY" ]; then
    echo "Generating application key..."
    php artisan key:generate --force
fi

# ── Ensure writable directories exist ────────────────────────
mkdir -p storage/framework/sessions \
         storage/framework/views \
         storage/framework/cache \
         storage/logs \
         bootstrap/cache

chown -R www-data:www-data storage bootstrap/cache
chmod -R 755 storage bootstrap/cache

# ── Cache configuration for production ───────────────────────
php artisan config:cache
php artisan route:cache
php artisan view:cache

# ── Run database migrations ───────────────────────────────────
# (Railway also runs this as a pre-deploy command, but we run it
#  here as a safety net for first-boot scenarios)
php artisan migrate --force --no-interaction

# ── Hand off to the main process (apache2-foreground) ─────────
exec "$@"
