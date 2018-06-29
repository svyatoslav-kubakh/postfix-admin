FROM php:7.2-cli-alpine

RUN docker-php-ext-install pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

WORKDIR /app

CMD ["sh", "docker/cli/setup.sh"]
