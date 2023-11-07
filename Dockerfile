# Use an official PHP runtime as the base image
FROM php:7.4-apache

# Install git and composer dependencies
# Install git in the builder stage in case it is needed for composer dependencies
RUN apt-get update && \
    apt-get install -y git && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory in the container
WORKDIR /var/www/html

# Install the AWS SDK for PHP and any other dependencies
RUN composer require aws/aws-sdk-php

# Copy your PHP application code to the container
COPY . /var/www/html

# Expose port 80 for Apache
EXPOSE 80

# Start Apache when the container runs
CMD ["apache2-foreground"]