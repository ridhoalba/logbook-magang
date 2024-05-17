FROM php:8.2
RUN apt-get update -y && apt-get install -y openssl zip unzip git \
        git \
        unzip \
        libpq-dev \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
WORKDIR /app
COPY . /app

RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache
# Create entrypoint script
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Run the entrypoint script
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
EXPOSE 80