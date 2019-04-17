<?php

namespace WhiteCatDev\LaravelOrders;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;


class LaravelOrdersServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }


    public function boot(Filesystem $filesystem)
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-orders.php', 'laravel-orders');

        include __DIR__ . '/routes.php';
        

        if ($this->app->runningInConsole())
        { 
            $this->publishes([
                __DIR__  . '/../config/laravel-orders.php' => config_path('laravel-orders.php'),
            ], 'config');


            $this->publishes([
                __DIR__ . '/../migrations/create_orders_products_table.php' => $this->getMigrationFileName($filesystem, 'create_orders_products_table.php'),
                __DIR__ . '/../migrations/create_orders_table.php' => $this->getMigrationFileName($filesystem, 'create_orders_table.php'),
                __DIR__ . '/../migrations/create_products_table.php' => $this->getMigrationFileName($filesystem, 'create_products_table.php')
            ], 'migrations');
        }
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
