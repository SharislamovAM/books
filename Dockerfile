FROM php:8.2-fpm-alpine AS base

ENV WORK_DIR /var/www/books

RUN set -xe \
    && apk update && apk add --no-cache libpq-dev \
    && docker-php-ext-install -j$(nproc) pdo \
    && docker-php-ext-install -j$(nproc) pdo_pgsql \
    && docker-php-ext-install -j$(nproc) pgsql

FROM base

COPY . ${WORK_DIR}

EXPOSE 9000
CMD ["php-fpm"]
