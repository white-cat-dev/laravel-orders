<?php

namespace WhiteCatDev\LaravelOrders\Models;

use Illuminate\Database\Eloquent\Model;
use WhiteCatDev\LaravelOrders\Models\Product;


class Order extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class, 'orders_products', 'order_id', 'product_id')->withPivot('count');
    }
}
