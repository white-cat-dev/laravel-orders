<?php

namespace WhiteCatDev\LaravelOrders\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
    	'name',
    	'description',
    	'price'
    ];
}
