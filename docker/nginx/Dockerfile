# Use the official PHP image with FPM and PHP 8.3
FROM php:8.3-fpm

# ARG UID=1000
# ARG GID=1000

# Check if the group exists before creating it
# RUN if ! getent group www-data > /dev/null 2>&1; then \
#     groupadd -g 1000 www-data; \
# fi

# # Check if the user exists before creating it
# RUN if ! id -u www-data > /dev/null 2>&1; then \
#     useradd -u 1000 -g www-data -m www-data; \
# fi
# Install necessary PHP extensions and dependencies
RUN apt-get update

RUN apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libwebp-dev \
    libzip-dev \
    libicu-dev \
    unzip

RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp

RUN docker-php-ext-install gd pdo pdo_mysql zip intl

RUN apt-get clean && rm -rf /var/lib/apt/lists/*


# Set the working directory
WORKDIR /var/www/html

COPY . /var/www/html

# RUN chown -R www-data:www-data /var/www
# RUN chmod -R 777 /var/www/bootstrap/cache && chmod -R 777 /var/www/bootstrap/cache

# Set ownership and permissions
# RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache \
#     && chown -R www-data:www-data /var/www/html \
#     && find /var/www/html -type f -exec chmod 644 {} \; \
#     && find /var/www/html -type d -exec chmod 755 {} \; \
#     && chmod -R 775 /var/www/html/storage \
#     && chmod -R 775 /var/www/html/bootstrap/cache

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Laravel dependencies
#RUN composer install

# Expose port 9000
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
