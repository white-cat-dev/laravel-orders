# Larevel orders
## Introduction
A Laravel package to manage orders in your application.

## Installation

```
composer require white-cat-dev/laravel-orders
```

Then, publish the config

```
php artisan vendor:publish --provider="WhiteCatDev\LaravelOrders\LaravelOrdersServiceProvider" --tag="config"
```

and the migration

```
php artisan vendor:publish --provider="WhiteCatDev\LaravelOrders\LaravelOrdersServiceProvider" --tag="migrations"
```
