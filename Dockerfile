FROM php:8.2-apache

# Enable necessary PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache modules
RUN a2enmod rewrite

# Use the app's source folder as the web root
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
RUN a2ensite 000-default

# Set working directory
WORKDIR /var/www/html
