# Larevel orders
## Introduction
A Laravel package to manage orders in your application.

## Installation

```
composer require white-cat-dev/laravel-orders
```

After installation，go to `config/app.php` under `providers` section to add the following:

```
WhiteCatDev\LaravelOrders\LaravelOrdersServiceProvider::class
```

Publish the config file with the commands:

```
php artisan vendor:publish --provider="WhiteCatDev\LaravelOrders\LaravelOrdersServiceProvider" --tag="config"
```

and the migrations:

php artisan vendor:publish --provider="WhiteCatDev\LaravelOrders\LaravelOrdersServiceProvider" --tag="migrations"
```
