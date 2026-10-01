FROM php:8.3-cli

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
# FIX: Menambahkan libmagickwand-dev (wajib untuk imagick)
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libzip-dev \
    libicu-dev \
    libmagickwand-dev \
    # Setup Node.js
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    # Install gosu for user switching (more reliable than su-exec)
    && curl -fsSL -o /usr/local/bin/gosu "https://github.com/tianon/gosu/releases/download/1.16/gosu-amd64" \
    && chmod +x /usr/local/bin/gosu \
    && gosu --version \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath intl zip

# FIX: Install & Enable Imagick via PECL
RUN pecl install imagick \
    && docker-php-ext-enable imagick

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user
RUN useradd -G www-data,root -u 1000 -d /home/laravel laravel
RUN mkdir -p /home/laravel/.composer && \
    chown -R laravel:laravel /home/laravel

# Create node_modules directory with correct permissions (will be overridden by volume, but ensures base structure)
RUN mkdir -p /var/www/html/node_modules && \
    chown -R laravel:laravel /var/www/html/node_modules

# Copy entrypoint script (before switching user so we can set ownership)
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh && \
    chown laravel:laravel /usr/local/bin/docker-entrypoint.sh

# Switch to user
USER laravel

# Expose port 8000
EXPOSE 8000

# Default command
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]