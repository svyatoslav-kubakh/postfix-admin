#!/usr/bin/env sh

MYSQL_START_DELAY=30

composer install

cp .env.dist .env

rm -rf console/runtime/cache backend/runtime/cache 
chown -R www-data:www-data backend/runtime backend/web/assets

echo "Waiting ${MYSQL_START_DELAY} seconds for mysql daemon starting..."
sleep ${MYSQL_START_DELAY}

php console/yii migrate --interactive=0
