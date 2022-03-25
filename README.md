# laravel-associate-developer-skills-test

## Backend Usage

Use PHP >= 8.0 for this application

First clone this repository

    cd laravel-associate-developer-skills-test

Then install a compiler

    composer install
    
Then create and configure .env

    cp .env.example .env
    
   Then create app key

    php artisan key:generate

   Then replace the app url

    APP_URL=http://127.0.0.1:8000

Compiling Assets (Mix)

    npm install

 and

    npm run dev

Then running migrations

    php artisan migrate
    
or

    php artisan migrate  --seed

Then create the symbolic link

    php artisan storage:link

Then start the server

    php artisan serve

## Api

Restful api with passport authentication

## Test

use the postman collection provided
    
## Security Vulnerabilities

If you discover a security vulnerability within this app, please send an e-mail to Shashika Nuwan via [Shashika Nuwan](mailto:kumararanaweera1999@gmail.com). All security vulnerabilities will be promptly addressed.
