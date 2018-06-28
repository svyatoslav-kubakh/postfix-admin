#!/usr/bin/env sh

MYSQL_START_DELAY=30

composer install

cp .env.dist .env

echo "Waiting ${MYSQL_START_DELAY} seconds for mysql daemon starting..."
sleep ${MYSQL_START_DELAY}

php console/yii migrate --interactive=0
