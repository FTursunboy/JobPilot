FROM php:8.3-fpm as php

RUN apt-get update && apt-get install -y \
      apt-utils \
      libpq-dev \
      libpng-dev \
      libzip-dev \
      zip \
      unzip \
      git && \
      docker-php-ext-install pdo_mysql && \
      docker-php-ext-install bcmath && \
      docker-php-ext-install gd && \
      docker-php-ext-install zip && \
      pecl install -o -f redis && \
      rm -rf /tmp/pear && \
      docker-php-ext-enable redis && \
      apt-get clean && \
      rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*


WORKDIR /var/www

COPU . .

COPY --from=composer:2.3.5 /usr/bin/composer /usr/bin/composer

ENTRYPOINT ["../docker/entrypoint.sh"]




