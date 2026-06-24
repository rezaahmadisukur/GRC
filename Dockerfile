# 1. Gunakan image PHP resmi dengan Apache
FROM php:8.2-apache

# 2. Instal library sistem yang dibutuhkan untuk MySQL & SSL
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    libmariadb-dev \
    ca-certificates \
    && docker-php-ext-install pdo_mysql gd

# 3. Aktifkan modul mod_rewrite Apache (Penting agar Route Laravel jalan)
RUN a2enmod rewrite

# 4. Ubah konfigurasi Apache agar mengarah ke folder /public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 5. Copy semua file proyek kamu ke dalam folder kerja di server
COPY . /var/www/html

# 6. Instal Composer (Alat instal library PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 7. Jalankan instalasi library Laravel (tanpa dev tool agar ringan)
RUN composer install --no-dev --optimize-autoloader

# 8. Beri izin akses (permission) ke folder storage agar Laravel bisa nulis log/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 9. Jalankan Apache
CMD ["apache2-foreground"]