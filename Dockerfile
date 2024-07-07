# Use the official PHP image as a base image
FROM php:8.1-apache

# Enable mod_rewrite
RUN a2enmod rewrite

# Restart Apache
RUN service apache2 restart

# Copy project files to the /var/www/html directory inside the container
COPY . /var/www/html

# Set the working directory
WORKDIR /var/www/html

# Install MySQL extension for PHP
RUN docker-php-ext-install mysqli

# Install other PHP extensions if required
# RUN docker-php-ext-install pdo pdo_mysql

# Expose port 80 to the host
EXPOSE 80