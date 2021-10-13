FROM php:7.2-apache

RUN apt-get update \
  && apt-get install -y zlib1g-dev libzip-dev libjpeg-dev libpng-dev libpq-dev mariadb-client unzip\
  && docker-php-ext-install zip pdo_mysql mysqli \
  && docker-php-ext-enable mysqli

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

WORKDIR /var/www/html

RUN echo "Listen 8001 " >> /etc/apache2/ports.conf

# Create SSL cert for debugging and enable ssl module
#RUN make-ssl-cert generate-default-snakeoil
#RUN a2enmod ssl

COPY ./etc_apche2/keys/local-server.crt /etc/ssl/certs/
COPY ./etc_apche2/keys/local-server.key /etc/ssl/private/
RUN  a2ensite default-ssl

#COPY ./etc_apche2/sites-available/*.conf /etc/apache2/sites-enabled/
COPY ./etc_apche2/sites-available/base.conf /etc/apache2/sites-available/base.conf
RUN a2ensite base.conf
COPY ./etc_apche2/sites-available/vhosts.conf /etc/apache2/sites-available/vhosts.conf
RUN a2ensite vhosts.conf
COPY ./etc_apche2/sites-available/000-default.conf /etc/apache2/sites-available/000-default.conf
RUN a2ensite 000-default.conf

RUN a2enmod rewrite

COPY ./php.ini /usr/local/etc/php/

# ポートの解放
EXPOSE 8001 443 80