# Use an official PHP runtime as a parent image
FROM php:8.1-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy the Apache configuration
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Copy the current directory contents into the container
COPY . .

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install project dependencies
RUN composer install --no-scripts --no-autoloader

# Install PHPUnit
RUN composer require --dev phpunit/phpunit ^9.5

# Generate optimized autoloader
RUN composer dump-autoload --optimize

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && find /var/www/html -type d -exec chmod 755 {} \; \
    && find /var/www/html -type f -exec chmod 644 {} \;

# Expose port 80
EXPOSE 80

# Instalar dependencias necesarias
RUN apt-get update && apt-get install -y \
    cron \
    vim \
    && rm -rf /var/lib/apt/lists/*

# Crear directorio para los scripts
WORKDIR /var/www/cron

# Copiar scripts
COPY cron-jobs/ .
COPY entrypoint.sh /entrypoint.sh

# Dar permisos de ejecución
RUN chmod +x /entrypoint.sh
RUN chmod +x *.php

# Configurar crontab
COPY crontab /etc/cron.d/crontab
RUN chmod 0644 /etc/cron.d/crontab
RUN crontab /etc/cron.d/crontab

# Punto de entrada
ENTRYPOINT ["/entrypoint.sh"]
CMD ["cron", "-f"]