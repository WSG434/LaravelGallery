FROM php:8.3-fpm

RUN printf "deb http://mirror.yandex.ru/debian/ bookworm main contrib non-free non-free-firmware \n deb-src http://mirror.yandex.ru/debian/ bookworm main contrib non-free non-free-firmware \n deb http://security.debian.org/debian-security bookworm-security main contrib non-free non-free-firmware \n deb-src http://security.debian.org/debian-security bookworm-security main contrib non-free non-free-firmware \n deb http://mirror.yandex.ru/debian/ bookworm-updates main contrib non-free non-free-firmware \n deb-src http://mirror.yandex.ru/debian/ bookworm-updates main contrib non-free non-free-firmware" > /etc/apt/sources.list

RUN apt-get update && apt-get install -y libmcrypt-dev libpng-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libgd-dev

RUN docker-php-ext-install pdo_mysql && \
 docker-php-ext-configure exif && \
 docker-php-ext-install exif && \
 docker-php-ext-enable exif

COPY ./conf.d/* /usr/local/etc/php/conf.d/
COPY ./php.ini /usr/local/etc/php/


WORKDIR /var/www



