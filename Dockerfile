FROM php:8.3-apache

RUN a2enmod rewrite

RUN apt-get update \
    && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_mysql

RUN apt-get install -y wget --no-install-recommends

RUN wget https://getcomposer.org/download/2.0.9/composer.phar \
    && mv composer.phar /usr/bin/composer && chmod +x /usr/bin/composer

COPY apache.conf /etc/apache2/sites-enabled/000-default.conf

WORKDIR /var/www/html

CMD ["apache2-foreground"]
