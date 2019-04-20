<?php

Route::prefix(config('laravel-orders.routes.api-prefix', 'laravel-orders-api'))
    ->namespace('WhiteCatDev\LaravelOrders\Controllers')
    ->group(function() {
        Route::get('/', 'ApiOrdersController@getOrders');

        Route::get('/{order}', 'ApiOrdersController@getOrder');
        Route::post('/{order}', 'ApiOrdersController@updateOrder');
        Route::delete('/{order}', 'ApiOrdersController@removeOrder');
        Route::post('/', 'ApiOrdersController@storeOrder');

        Route::post('/{order}/add', 'ApiOrdersController@addToOrder');
        Route::post('/{order}/remove', 'ApiOrdersController@removeFromOrder');
        Route::post('/{order}/update_count', 'ApiOrdersController@updateOrderCount');

        Route::get('/cart', 'ApiOrdersController@getUserCart');
    });