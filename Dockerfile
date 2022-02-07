FROM php:8.0-fpm
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions http

RUN apt-get update && apt-get install -y \
git \
curl \
libpng-dev \
libonig-dev \
libxml2-dev \
zip \
unzip

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Composer
# Installing composer
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN rm -rf composer-setup.php

RUN apt-get update && apt-get install -y \
software-properties-common \
npm

RUN mkdir -p /usr/src/php/ext/redis; \
	curl -fsSL https://pecl.php.net/get/redis --ipv4 | tar xvz -C "/usr/src/php/ext/redis" --strip 1; \
	docker-php-ext-install redis;

#RUN npm install npm@latest -g && \
#npm install n -g && \
#n latest

WORKDIR /app
COPY . /app

RUN composer install

CMD php artisan serve --host=0.0.0.0 --port=8000
EXPOSE 8000
