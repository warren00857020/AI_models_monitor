FROM php:8.2-fpm

# 安裝 PHP 擴展
RUN docker-php-ext-install pdo pdo_mysql

# 設置工作目錄
WORKDIR /var/www/html

# 設置權限
RUN chown -R www-data:www-data /var/www/html