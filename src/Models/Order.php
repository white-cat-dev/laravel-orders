<?php

namespace WhiteCatDev\LaravelOrders\Models;

use Illuminate\Database\Eloquent\Model;

use WhiteCatDev\LaravelOrders\Models\Product;


class Order extends Model
{
	protected $table = 'orders';

	protected $with = [
		'products'
	];

	const STATUS_CART = 1; 
    const STATUS_PROCESSING = 2; 
    const STATUS_CANCELED = 3; 
    const STATUS_DONE = 4;


    public function products()
    {
        return $this->belongsToMany(Product::class, 'orders_products', 'order_id', 'product_id')->withPivot('count');
    }


    public function getCountAttribute()
    {
    	return $this->products->sum('pivot.count');
    }


    public function getStatusNameAttribute()
    {
        $statusList = [
            self::STATUS_CART => 'Корзина',
            self::STATUS_PROCESSING => 'В обработке',
            self::STATUS_CANCELED => 'Отменен',
            self::STATUS_DONE => 'Завершен'
        ];

        return $statusList[$this->status];
    }
}
