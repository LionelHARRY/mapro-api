<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Building a REST API with Laravel

An API (Application Programming Interface) is a set of defined rules that explain how computers or applications communicate with one another. APIs sit between an application and the web server, acting as an intermediary layer that processes data transfer between systems.

## Setting Up a Laravel project

If Composer is already installed:

```sh
composer create-project laravel/laravel example-app
```

If using MariaDB, make a change in App\Providers\AppServiceProvider. Inside boot() function, add:

```sh
Schema::defaultStringLength(191)
```

This will set default db field length to 191. Otherwise, in some cases, there can be 'field too long' exception thrown.

## Create models and migration

```sh
php artisan make:model myModel -m
```

-m stands for migration

Inside database\migration\[latest migration] there are two importent functions : up() and down(). up() is where you set columns of the table that will be created in the database.

Inside the model, we can add a fillable variable for mass charging data.

## Create factories

Factory is where you create a faker for a model.

```sh
php artisan make:factory MyFactory --model=MyModel
```

--model option helps associate imediatly the factory and the related model. The factory must have the same name as the model plus the prefix 'Factory'.

Inside database\factory\MyFactory the definition() function returns a array containing fakers.

## Create seeders

You call the factory from the seeder and define how many data you want to create in the database

```sh
php artisan make:seeder MySeeder
```

Then, inside database\seeders\DatabaseSeeder, call newly created seeders.

## Create controllers

```sh
php artisan make:controller MyController --resource
```

--resource creates CRUD functions inside the controller

## Migration

```sh
php artisan migrate:fresh --seed
```

fresh means drop db and create new db.
--seed means add seeders in the database.
