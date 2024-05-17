#!/bin/sh

# Change to the application directory
cd /app

# Run necessary artisan commands
php artisan storage:link


# Start the Laravel development server
exec php artisan serve --host=0.0.0.0 --port=80