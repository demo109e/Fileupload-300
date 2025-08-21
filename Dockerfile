# Use official PHP + Apache image
FROM php:8.2-apache

# Enable PHP extensions
RUN docker-php-ext-install mysqli

# Copy project files into container
COPY src/ /var/www/html/

# Set permissions for uploads folder
RUN mkdir -p /var/www/html/uploads && chmod -R 777 /var/www/html/uploads

# Expose Apache port
EXPOSE 80
