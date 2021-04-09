

FROM php:7.3-apache-stretch

RUN apt-get update \
    && apt-get install -y vim nano git zlib1g-dev libzip-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev ffmpeg\
    && docker-php-ext-configure gd --with-freetype-dir=/usr --with-jpeg-dir=/usr --with-png-dir=/usr \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install zip mysqli pdo_mysql \
    && apt-get install -y libxml2-dev \
    && docker-php-ext-install soap \
    # && pecl install xdebug \
    # && docker-php-ext-enable xdebug \
    # && echo 'xdebug.remote_enable = on' >> /usr/local/etc/php/conf.d/xdebug.ini \
    # && echo 'xdebug.remote_host = host.docker.internal' >> /usr/local/etc/php/conf.d/xdebug.ini \
    # && echo 'xdebug.remote_port = 9000' >>  /usr/local/etc/php/conf.d/xdebug.ini \
    # && echo 'xdebug.max_nesting_level = 500' >>  /usr/local/etc/php/conf.d/xdebug.ini \
    && a2enmod rewrite \
    && sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf \
    && curl -sS https://getcomposer.org/installer \
    | php -- --install-dir=/usr/local/bin --filename=composer \
    && curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony \
    && chmod a+x /usr/local/bin/symfony \
    && echo "AllowEncodedSlashes On" >> /etc/apache2/apache2.conf \
    && chown www-data:www-data -R /var/www/html/public/uploads \
    && chmod 0755 -R /var/www/html/public/uploads

WORKDIR /var/www/html