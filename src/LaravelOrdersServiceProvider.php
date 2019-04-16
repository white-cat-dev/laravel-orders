<?php

namespace WhiteCatDev\LaravelOrders;

use Illuminate\Support\ServiceProvider;


class LaravelOrdersServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerOrdersRoutes();
    }


    public function boot(Filesystem $filesystem)
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-orders.php', 'laravel-orders');

        if ($this->app->runningInConsole())
        { 
            $this->publishes([
                __DIR__  . '/../config/laravel-orders.php' => config_path('laravel-orders.php'),
            ], 'config');


            $this->publishes([
                __DIR__ . '/../database/migrations/create_orders_products_table.php' => $this->getMigrationFileName($filesystem, 'create_orders_products_table.php'),
                __DIR__ . '/../database/migrations/create_orders_table.php' => $this->getMigrationFileName($filesystem, 'create_orders_table.php'),
                __DIR__ . '/../database/migrations/create_products_table.php' => $this->getMigrationFileName($filesystem, 'create_products_table.php')
            ], 'migrations');
        }
    }


    public function registerOrdersRoutes()
    {
        Route::prefix(config('laravel-orders.routes.prefix', 'laravel-orders-api'))
             ->namespace('WhiteCatDev\LaravelOrders\Controllers')
             ->group(function() {
                //
             });
    }


    protected function getMigrationFileName(Filesystem $filesystem, $migrationFileName)
    {
        $timestamp = date('Y_m_d_His');
        return Collection::make(database_path('/migrations/'))
            ->flatMap(function ($path) use ($filesystem, $migrationFileName) {
                return $filesystem->glob($path . '*_' . $migrationFileName);
            })
            ->push(database_path('/migrations/' . $timestamp . '_' . $migrationFileName))
            ->first();
    }
}
