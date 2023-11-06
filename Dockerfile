# Use an official PHP runtime as the base image
FROM php:7.4-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy your PHP application code to the container
COPY . /var/www/html

# Install the AWS SDK for PHP and any other dependencies
RUN composer require aws/aws-sdk-php

# Expose port 80 for Apache
EXPOSE 80

# Start Apache when the container runs
CMD ["apache2-foreground"]