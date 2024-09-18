# Step 1: Build react app and copy it to profile
FROM node:18-alpine as build

WORKDIR /app

COPY package*.json ./

RUN npm install

COPY . .

RUN npm run build


# Step2: Use PHP with Apache as the base image
FROM php:8.2-apache as web

# Install Additional System Dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable Apache mod_rewrite for URL rewriting
RUN a2enmod rewrite

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql zip

# Configure Apache DocumentRoot to point to Laravel's public directory
# and update Apache configuration files
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copy the application code
COPY . /var/www/html

# Copy the build artifacts from the React app build stage
COPY --from=build /app/public /var/www/html/public

# Set the working directory
WORKDIR /var/www/html

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install project dependencies
RUN composer install

# Generate application key
RUN php artisan key:generate

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
