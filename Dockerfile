# Gunakan official PHP image sebagai base image
FROM php:8.2-fpm

# Set environment variables
ENV DEBIAN_FRONTEND=noninteractive

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    libxslt1-dev \
    libssl-dev \
    cron \
    supervisor

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd xml zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Buat direktori kerja
WORKDIR /var/www

# Salin file composer.json dan composer.lock
COPY composer.json composer.lock ./

# Install dependencies
RUN composer install --no-scripts --no-autoloader

# Salin seluruh project ke container
COPY . .

# Jalankan autoloader
RUN composer dump-autoload --optimize

# Ganti ownership file ke www-data
RUN chown -R www-data:www-data /var/www

# Ekspose port yang akan digunakan
EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
