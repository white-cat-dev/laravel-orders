<?php

return [

    'routes' => [
    	'api-prefix' => 'laravel-orders-api'
    ],

    'assets' => [
    	'angularjs-path' => 'js/app'
    ],

    'models' => [
        'product' => WhiteCatDev\LaravelOrders\Models\Product::class,
        'order' => WhiteCatDev\LaravelOrders\Models\Order::class,
    ],
];