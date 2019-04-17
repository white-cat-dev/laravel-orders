<?php

namespace WhiteCatDev\LaravelOrders\Services;

use WhiteCatDev\LaravelOrders\Models\Order;


class OrdersService
{
    protected static $items;


    public function __construct()
    {
        static::$items = Order::with('products')->get();
    }


    public function getItems()
    {
        return static::$items;
    }


    public function getItemById($id)
    {
        return static::$items->where('id', $id)->first();
    }
}