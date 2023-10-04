# Use the official PHP image
FROM php:8.2-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Set the working directory
WORKDIR /var/www

# Install necessary Linux libraries and tools
RUN apt-get update -y && apt-get install -y \
    libicu-dev \
    libmariadb-dev \
    unzip zip \
    zlib1g-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev

# Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install PHP extensions
RUN docker-php-ext-install gettext intl pdo_mysql gd

# Configure and install the GD extension
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

# Add a user for the Laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Create a system user to run Composer and Artisan commands
RUN useradd -m -G www-data -u $uid -d /home/www www
RUN mkdir -p /home/www/.composer && \
    chown -R www:www /home/www

# Copy the application files
COPY . /var/www
# Copy the .env.example file and generate an application key
COPY .env.example .env
RUN php artisan key:generate
RUN php artisan migrate

# Change ownership of storage/logs
RUN mkdir -p storage/logs && chown -R www:www storage/logs

# Switch to the www user
USER www

# Expose port 9000 and start PHP-FPM
EXPOSE 9000
CMD ["php-fpm"]
