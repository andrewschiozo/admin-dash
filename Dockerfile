FROM php:8.2-fpm-alpine

# PHP ext
RUN apk add --no-cache $PHPIZE_DEPS curl-dev \
    && docker-php-ext-install curl fileinfo mbstring openssl pdo_mysql pdo_odbc pdo_sqlite pdo_pgsql zip

# PHP Timezone
RUN echo "date.timezone = America/Sao_Paulo" > "$PHP_INI_DIR/conf.d/date_timezone.ini"

# Nginx
RUN apk add --no-cache nginx

# Nginx config
COPY nginx.conf /etc/nginx/nginx.conf

# Copie os arquivos da sua aplicação
COPY . /var/www/html/

EXPOSE 80

# Nginx e PHP-FPM
CMD ["nginx", "-g", "daemon off;", "php-fpm"]