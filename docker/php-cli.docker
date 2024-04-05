FROM php:8.3-cli

#RUN printf "deb http://mirror.yandex.ru/debian/ bookworm main contrib non-free non-free-firmware \n deb-src http://mirror.yandex.ru/debian/ bookworm main contrib non-free non-free-firmware \n deb http://mirror.yandex.ru/debian/ bookworm-security main contrib non-free non-free-firmware \n deb-src http://mirror.yandex.ru/debian/ bookworm-security main contrib non-free non-free-firmware \n deb http://mirror.yandex.ru/debian/ bookworm-updates main contrib non-free non-free-firmware \n deb-src http://mirror.yandex.ru/debian/ bookworm-updates main contrib non-free non-free-firmware" > /etc/apt/sources.list
RUN printf "deb http://mirror.yandex.ru/debian/ bookworm main contrib non-free non-free-firmware \n deb-src http://mirror.yandex.ru/debian/ bookworm main contrib non-free non-free-firmware \n deb http://security.debian.org/debian-security bookworm-security main contrib non-free non-free-firmware \n deb-src http://security.debian.org/debian-security bookworm-security main contrib non-free non-free-firmware \n deb http://mirror.yandex.ru/debian/ bookworm-updates main contrib non-free non-free-firmware \n deb-src http://mirror.yandex.ru/debian/ bookworm-updates main contrib non-free non-free-firmware" > /etc/apt/sources.list

RUN apt-get update
RUN apt-get install -y apt-utils \
    git \
    curl \
    libpq-dev \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    apt-transport-https \
    lsb-release \
    ca-certificates \
    wget
  
RUN docker-php-ext-install pdo_mysql pcntl
RUN docker-php-ext-configure exif
RUN docker-php-ext-install exif
RUN docker-php-ext-enable exif

USER root
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN apt-get install -y ufw
#RUN wget https://getcomposer.org/installer && php installer

RUN ufw allow out 80/tcp
RUN ufw allow out 443/tcp

#RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
#RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
#RUN php -r "unlink('composer-setup.php');"

COPY --from=composer /usr/bin/composer /usr/bin/composer

#RUN curl -sS https://getcomposer.org/installer | php -- \
 #   --filename=composer \
  #  --install-dir=/usr/local/bin


#RUN curl -sS https://getcomposer.org/installer | php
#RUN mv composer.phar /usr/local/bin/composer
#RUN wget https://raw.githubusercontent.com/composer/getcomposer.org/76a7060ccb93902cd7576b67264ad91c8a2700e2/web/installer -O - -q | php -- --quiet

RUN apt-get install -y cron

USER 1000:1000

WORKDIR /var/www
