#!/bin/bash

gulp
composer dump-auto
php artisan migrate:reset
php artisan migrate:refresh
php artisan db:seed

