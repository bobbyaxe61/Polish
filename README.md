<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Polish


## Deploying Polish

#### Prerequisites 
- -- [php version 7.3 installed](https://www.php.net/downloads.php)
- -- [composer 1.9.0 installed](https://getcomposer.org/download/)
- -- [xampp with maria db 10.4.8 support](https://www.apachefriends.org/download.html) or [MariaDB 10.4.8 Server host system installed](https://downloads.mariadb.org/)

#### Procedure
- Open bash terminal
```
git clone [Insert App Git Link]
cd cloned/app/folder
composer update
```
- "composer update" command would be the equivalent of "npm install" command in react.js
- Create an sql data base (using a different type may require additional configuration)
- Update the settings in the .env.example file with your created data base parameters
```
nano .env.example
```
- rename .env.example file to .env
```
mv .env.example .env
```
- set application key
- run migrations to create tables in database
- run seeders to insert data in the created tables
```
php artisan key:generate
php artisan migrate
php artisan db:seed
```
- start server
```
php artisan serve
```
- "php artisan serve" command would be the equivalent of "npm start" command in react.js
- open severing address to view app

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1400 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). or if the vulnerability were related to this application only please send an e-mail to BobbyAxe61 via [Bobbyaxe61@gmail.com](mailto:Bobbyaxe61@gmail.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
