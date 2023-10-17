from php:8.1.24-fpm-bullseye

run apt update \
    && apt install -y unzip libpq-dev \
    && apt install -y ca-certificates curl gnupg

run php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer

run docker-php-ext-install pdo_pgsql

run pecl install xdebug \
    && docker-php-ext-enable xdebug

run mkdir -p /etc/apt/keyrings \
    && curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg \
    && NODE_MAJOR=16 && echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_$NODE_MAJOR.x nodistro main" | tee /etc/apt/sources.list.d/nodesource.list \
    && apt update \
    && apt install nodejs -y

copy src /app

workdir /app

run composer install
run chmod o+w -R bootstrap/cache storage