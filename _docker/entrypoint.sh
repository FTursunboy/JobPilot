#!/bin/bash

if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-interaction
fi

if [ ! -f ".env" ]; then
    echo "Creating a .env for env $APP_ENV"
    cp .env.example .env
else
    echo "env file exists"
fi

php artisan migrate
php artisan key:generate
php artisan optimize:clear

exec docker-php-entrypoint "$@"
