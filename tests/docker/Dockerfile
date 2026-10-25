FROM php:8.4-cli

# Local acceptance image only; never use this container as a production server.
RUN set -eux; \
    apt-get update; \
    apt-get install -y --no-install-recommends \
        git unzip \
        libcurl4-openssl-dev \
        libfreetype6-dev \
        libicu-dev \
        libjpeg62-turbo-dev \
        libonig-dev \
        libpng-dev \
        libsqlite3-dev \
        libzip-dev; \
    docker-php-ext-configure gd --with-freetype --with-jpeg; \
    docker-php-ext-install -j2 \
        bcmath curl exif gd intl mbstring pdo_mysql pdo_sqlite zip; \
    rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1
WORKDIR /app
