# Laravel 9 Starter Project

Hi, This repository contains a Laravel Starter with Admin LTE to make it easier for programmers to create projects.

## What's inside?

-   Required PHP 8
-   Laravel ^9.x - [laravel.com/docs/9.x](https://laravel.com/docs/9.x)

## What next?

Clone Or Download this repository

```shell
# install composer-dependency
$ composer install
```

Before we start web server make sure we already generate app key, configure `.env` file and do migration.

```shell
# create copy of .env && configuration the database
$ cp .env.example .env
# create laravel key
$ php artisan key:generate
# laravel migrate
$ php artisan migrate
```
