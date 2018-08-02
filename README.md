# sample-laravel-api
Sample Laravel app api implementation 

## Installation

- install required packages
```
composer install
```

- Create `.env` file
```
cp .env.example .env
```

- Set the application key
```
php artisan key:generate
```

- migrate tables, seed example data
```
php artisan migrate --seed
```

- generate documentation
```
./vendor/bin/openapi routes app -o public/openapi.json -b bootstrap/constants.php
```

## Docker

- run Docker and init project
```
cd docker \
    && docker-compose up -d --build mysql nginx php-fpm redis workspace \
    && docker-compose exec workspace cp .env.example .env \
    && docker-compose exec workspace composer install --prefer-dist \
    && docker-compose exec workspace chmod -R 0777 /var/www/storage \
    && docker-compose exec workspace php artisan key:generate \
    && docker-compose exec workspace php artisan route:cache \
    && docker-compose exec workspace php artisan config:cache \
    && docker-compose exec workspace php artisan migrate --seed
```