FROM php:8.3-fpm

#RUN printf "deb http://mirror.yandex.ru/debian/ bookworm main contrib non-free non-free-firmware \n deb-src http://mirror.yandex.ru/debian/ bookworm main contrib non-free non-free-firmware \n deb http://mirror.yandex.ru/debian/ bookworm-security main contrib non-free non-free-firmware \n deb-src http://mirror.yandex.ru/debian/ bookworm-security main contrib non-free non-free-firmware \n deb http://mirror.yandex.ru/debian/ bookworm-updates main contrib non-free non-free-firmware \n deb-src http://mirror.yandex.ru/debian/ bookworm-updates main contrib non-free non-free-firmware" > /etc/apt/sources.list
RUN printf "deb http://mirror.yandex.ru/debian/ bookworm main contrib non-free non-free-firmware \n deb-src http://mirror.yandex.ru/debian/ bookworm main contrib non-free non-free-firmware \n deb http://security.debian.org/debian-security bookworm-security main contrib non-free non-free-firmware \n deb-src http://security.debian.org/debian-security bookworm-security main contrib non-free non-free-firmware \n deb http://mirror.yandex.ru/debian/ bookworm-updates main contrib non-free non-free-firmware \n deb-src http://mirror.yandex.ru/debian/ bookworm-updates main contrib non-free non-free-firmware" > /etc/apt/sources.list

RUN apt-get update && apt-get install -y libmcrypt-dev libpng-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libgd-dev

RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-configure exif
RUN docker-php-ext-install exif
RUN docker-php-ext-enable exif

RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-webp=/usr/include/  --with-jpeg=/usr/include/
RUN docker-php-ext-install -j$(nproc) gd

COPY --from=composer /usr/bin/composer /usr/bin/composer

#RUN apt-get install -y wget unzip curl
#RUN curl -sS https://getcomposer.org/installer | php
#RUN mv composer.phar /usr/local/bin/composer

COPY ./conf.d/* /usr/local/etc/php/conf.d/
COPY ./php.ini /usr/local/etc/php/


WORKDIR /var/www



