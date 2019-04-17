<?php

return [
    'models' => [
        'product' => WhiteCatDev\LaravelOrders\Models\Product::class,
        'order' => WhiteCatDev\LaravelOrders\Models\Order::class,
    ],
    'routes' => [
    	'api-prefix' => 'laravel-orders-api'
    ]
];