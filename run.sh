cp /var/www/.env.example /var/www/.env
composer install
php artisan key:generate