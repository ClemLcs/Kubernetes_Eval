FROM php:8.2-fpm-alpine

# Installation des dépendances nécessaires
RUN apk add --no-cache \
    bash \
    libpq-dev \
    icu-dev \
    zlib-dev \
    libxml2-dev \
    oniguruma-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install -j$(nproc) \
        pdo_pgsql \
        pgsql \
        intl \
        mbstring \
        zip \
        exif \
        pcntl \
        bcmath \
        opcache

# Installation de Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Définition du répertoire de travail
WORKDIR /var/www/html

# Copie des fichiers de l'application
COPY . /var/www/html

# Installe les dépendances
RUN composer install

# Définition des permissions appropriées
RUN chown -R www-data:www-data /var/www/html

# Exposition du port 9000
EXPOSE 9000

# Commande de démarrage
CMD ["php-fpm"]
