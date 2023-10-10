from php:8.1.24-fpm-bullseye

run apt update \
    && apt install -y unzip

run php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer

copy src /app

workdir /app

run composer install
run chmod o+w -R bootstrap/cache storage