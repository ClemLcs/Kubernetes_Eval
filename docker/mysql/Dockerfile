FROM php:8.2-fpm-alpine
LABEL authors="Clement LO-CASCIO"

# Installe les dépendances nécessaires
RUN apk add --no-cache \
    bash \
    curl \
    libpng-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    libxpm-dev \
    freetype-dev \
    oniguruma-dev \
    libzip-dev \
    zip \
    unzip \
    icu-dev \
    zlib-dev \
    libxml2-dev \
    libmcrypt-dev \
    gmp-dev \
    && docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg \
        --with-webp \
        --with-xpm \
    && docker-php-ext-install -j$(nproc) \
        pdo_mysql \
        mysqli \
        mbstring \
        zip \
        exif \
        pcntl \
        intl \
        bcmath \
        opcache \
        gmp \
        gd

# Installe Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Définit le répertoire de travail
WORKDIR /var/www/html

# Copie les fichiers de l'application dans le conteneur
COPY ../.. /var/www/html

# Installe les dépendances
RUN composer install

# Définit les permissions appropriées
RUN chown -R www-data:www-data /var/www/html

# Expose le port 9000 pour PHP-FPM
EXPOSE 9000

# Définit le point d'entrée
CMD ["php-fpm"]
