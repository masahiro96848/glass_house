#!/bin/bash

set -eux

cd ~/glass_house/laravel
php artisan migrate --force
php artisan config:cache
php artisan config:clear