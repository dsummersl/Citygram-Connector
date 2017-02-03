FROM php:7
RUN apt-get update -qq \
  && apt-get install -y \
    git \
    libcurl4-openssl-dev \
    libssl-dev \
    openssl \
    unzip \
  && rm -rf /var/lib/apt/lists/*
RUN pecl install mongodb && docker-php-ext-enable mongodb

RUN mkdir /myapp
WORKDIR /myapp

COPY . /myapp

RUN groupadd -r webapp && useradd -r -m -g webapp webapp
RUN chown -R webapp:webapp /myapp

EXPOSE 8080

USER webapp
RUN curl -sS https://getcomposer.org/installer | php && \
  php composer.phar global require "fxp/composer-asset-plugin:~1.1.1" && \
  php composer.phar install
