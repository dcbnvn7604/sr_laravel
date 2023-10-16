from php:8.1.24-fpm-bullseye

run apt update \
    && apt install -y unzip libpq-dev

run php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer

run docker-php-ext-install pdo_pgsql

run pecl install xdebug \
    && docker-php-ext-enable xdebug

copy src /app

workdir /app

run composer install
run chmod o+w -R bootstrap/cache storage