Route::prefix(config('laravel-orders.routes.api-prefix', 'laravel-orders-api'))
    ->namespace('WhiteCatDev\LaravelOrders\Controllers\Api')
    ->group(function() {
        Route::get('/', 'OrdersController@getOrders');
        Route::get('/{order}', 'OrdersController@getOrder');
        Route::post('/{order}', 'OrdersController@updateOrder');
        Route::delete('/{order}', 'OrdersController@deleteOrder');
        Route::post('/', 'OrdersController@storeOrder');
    });