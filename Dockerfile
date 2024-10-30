# Usa una imagen base de PHP con extensiones para Laravel
FROM php:8.1-fpm

# Instala las extensiones necesarias de PHP y Composer
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia el código de la aplicación
COPY . /var/www

# Establece el directorio de trabajo
WORKDIR /var/www

# Instala las dependencias de Composer
RUN composer install --optimize-autoloader --no-dev

# Permite acceso de red para Laravel en el puerto 8000
EXPOSE 8000

# Comando para iniciar Laravel
CMD php artisan serve --host=0.0.0.0 --port=8000
