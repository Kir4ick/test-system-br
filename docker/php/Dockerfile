FROM php:8.0-fpm

# Set working directory
WORKDIR /var/www/app

RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    libpq-dev \
    unzip \
    git \
    curl && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Set environment variables for user
ARG USER_ID=1000
ARG GROUP_ID=1000

# Create a user with the specified UID and GID
RUN groupadd -g ${GROUP_ID} appgroup && \
    useradd -u ${USER_ID} -g appgroup -m appuser

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy application files
COPY . /var/www/app

# Fix permissions
RUN chown -R appuser:appgroup /var/www/app
RUN chmod -R 775 /var/www/app

# Switch to the new user
USER appuser

CMD ["php-fpm"]
