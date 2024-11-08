# Sử dụng PHP 8.3 với Apache
FROM php:8.3-apache

# Cài đặt các extension cần thiết cho MySQL và cURL
RUN apt-get update && apt-get install -y \
    libcurl4-openssl-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install mysqli pdo_mysql curl

# Copy mã nguồn vào thư mục mặc định của Apache
COPY ./src /var/www/html

# Cấp quyền truy cập cho thư mục ứng dụng
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Kích hoạt mod_rewrite cho Apache để hỗ trợ URL thân thiện
RUN a2enmod rewrite

# Khởi động Apache
CMD ["apache2-foreground"]
