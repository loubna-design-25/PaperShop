# ============================================================
# Stage 1 — Node.js: compile frontend assets with Vite
# ============================================================
FROM node:20-alpine AS node-builder

WORKDIR /app

# Install Node dependencies
COPY package.json package-lock.json ./
RUN npm ci --ignore-scripts

# Copy source files needed by Vite
COPY vite.config.js ./
COPY resources/ ./resources/

# Build production assets (outputs to public/build)
RUN npm run build

# ============================================================
# Stage 2 — PHP/Apache: production application image
# ============================================================
FROM php:8.2-apache AS app

# ── System dependencies ──────────────────────────────────────
RUN apt-get update && apt-get install -y --no-install-recommends \
        git \
        curl \
        unzip \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        libonig-dev \
        libxml2-dev \
        libzip-dev \
        libpq-dev \
        libicu-dev \
        zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" \
        pdo \
        pdo_mysql \
        pdo_pgsql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        zip \
        intl \
        opcache \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# ── Composer ─────────────────────────────────────────────────
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# ── Apache configuration ──────────────────────────────────────
# Enable mod_rewrite for Laravel's pretty URLs
RUN a2enmod rewrite

# Point Apache DocumentRoot at Laravel's public/ directory
# and listen on port 8080 (Railway requirement)
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf \
    && sed -i 's|Listen 80|Listen 8080|g' /etc/apache2/ports.conf \
    && sed -i 's|<VirtualHost \*:80>|<VirtualHost *:8080>|g' /etc/apache2/sites-available/000-default.conf

# Allow .htaccess overrides inside the public directory
RUN { \
        echo '<Directory /var/www/html/public>'; \
        echo '    AllowOverride All'; \
        echo '    Require all granted'; \
        echo '</Directory>'; \
    } >> /etc/apache2/apache2.conf

# ── PHP configuration ─────────────────────────────────────────
RUN { \
        echo 'opcache.enable=1'; \
        echo 'opcache.memory_consumption=128'; \
        echo 'opcache.interned_strings_buffer=8'; \
        echo 'opcache.max_accelerated_files=10000'; \
        echo 'opcache.revalidate_freq=0'; \
        echo 'opcache.validate_timestamps=0'; \
        echo 'opcache.fast_shutdown=1'; \
    } > /usr/local/etc/php/conf.d/opcache.ini \
    && { \
        echo 'upload_max_filesize=64M'; \
        echo 'post_max_size=64M'; \
        echo 'memory_limit=256M'; \
        echo 'max_execution_time=60'; \
    } > /usr/local/etc/php/conf.d/laravel.ini

# ── Application ───────────────────────────────────────────────
WORKDIR /var/www/html

# Install PHP dependencies (production only, no dev packages)
COPY composer.json composer.lock ./
RUN composer install \
        --no-dev \
        --no-interaction \
        --no-progress \
        --optimize-autoloader \
        --prefer-dist

# Copy the full application source
COPY . .

# Bring in the compiled frontend assets from the node-builder stage
COPY --from=node-builder /app/public/build ./public/build

# ── Permissions ───────────────────────────────────────────────
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# ── Entrypoint ────────────────────────────────────────────────
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 8080

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]
