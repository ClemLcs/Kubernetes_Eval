FROM php:8.2-fpm-alpine
LABEL authors="Clement LO-CASCIO"

# Mise à jour et installation des dépendances nécessaires
RUN apk update && apk add --no-cache \
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

# Installation de Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Répertoire de travail
WORKDIR /var/www/html

# Copie de l'application
COPY php/www /var/www/html

# Installation des dépendances PHP
RUN composer install --no-interaction --no-progress --prefer-dist

# Permissions
RUN chown -R www-data:www-data /var/www/html

# Port exposé
EXPOSE 9000

# Commande de lancement
CMD ["php-fpm"]
