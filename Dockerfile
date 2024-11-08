FROM php:8.3-apache

# Cài đặt extension mysqli
RUN apt-get update && apt-get install -y libmariadb-dev && docker-php-ext-install mysqli

# Cài đặt các dependency khác nếu cần thiết
RUN docker-php-ext-enable mysqli
