FROM php:8.2-fpm

ARG WWWGROUP

WORKDIR /var/www/app

ENV TZ=UTC

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
RUN apt-get update \
    && apt-get install -y apt-utils \
    && apt-get install -y \
        git \
        wget \
        zip \
        unzip \
        curl \
        libssl-dev \
        libxml2-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libsodium-dev \
        libmcrypt-dev \
        libmemcached-dev \
        supervisor \
        libzip-dev \
        freetds-dev \
    && apt-get install cron -y \
    && apt-get clean \

RUN docker-php-ext-install mbstring exif bcmath

RUN docker-php-ext-configure pcntl --enable-pcntl \
  && docker-php-ext-install \
    pcntl zip

# Composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer \
    && composer self-update

RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
    && docker-php-ext-install gd


# Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get update \
    && apt-get install -y nodejs \
    && apt-get clean \
    && apt-get install -y vim

RUN sh -c "$(wget -O- https://github.com/deluan/zsh-in-docker/releases/download/v1.2.0/zsh-in-docker.sh)" -- \
    -t frisk

COPY php.ini /usr/local/etc/php/conf.d/

VOLUME /var/www/app

ADD runtimes/supervisor.conf.d /etc/supervisor/conf.d

COPY runtimes/cron-jobs/schedule-run /etc/cron.d/schedule-run
RUN chmod 0644 /etc/cron.d/schedule-run
RUN crontab /etc/cron.d/schedule-run
RUN touch /var/log/cron.log
