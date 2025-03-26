FROM php:8.2-fpm-alpine

# PHP ext
RUN apk add --no-cache $PHPIZE_DEPS \
    && docker-php-ext-install fileinfo

RUN apk add --no-cache $PHPIZE_DEPS \
    && docker-php-ext-install mbstring

RUN apk add --no-cache $PHPIZE_DEPS \
    && docker-php-ext-install openssl

RUN apk add --no-cache $PHPIZE_DEPS \
    && docker-php-ext-install pdo_mysql

RUN apk add --no-cache $PHPIZE_DEPS \
    && docker-php-ext-install pdo_odbc

RUN apk add --no-cache $PHPIZE_DEPS \
    && docker-php-ext-install pdo_sqlite

RUN apk add --no-cache $PHPIZE_DEPS \
    && docker-php-ext-install pdo_pgsql

RUN apk add --no-cache $PHPIZE_DEPS \
    && docker-php-ext-install zip

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