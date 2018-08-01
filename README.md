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