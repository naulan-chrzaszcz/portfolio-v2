FROM php:8.3-apache-bookworm

RUN docker-php-ext-install \
        mysqli

COPY src/ /var/www/html/
