FROM php:8.1-apache
WORKDIR /var/www/html
RUN apt-get update && apt-get install -y libmariadb-dev
RUN docker-php-ext-install mysqli
RUN apt-get install -y make
