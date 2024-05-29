#!/bin/sh

# Change to the application directory
cd /app

# Run necessary artisan commands

cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan migrate:fresh --seed
php artisan storage:link 


# Start the Laravel development server
exec php artisan serve --host=0.0.0.0 --port=80