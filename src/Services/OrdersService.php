<?php

namespace WhiteCatDev\LaravelOrders\Services;

use WhiteCatDev\LaravelOrders\Models\Order;


class OrdersService
{
    public function getOrders($query = [])
    {
        return Order::search($query)->get();
    }


    public function getOrder($orderId)
    {
        return Order::firstOrFail($orderId);
    }


    public function updateOrder($orderId, $orderData)
    {
        $order = Order::firstOrFail($orderId);
        $order->update($orderData);
        return $order;
    }


    public function removeOrder($orderId)
    {
        Order::destroy($orderId);
    }


    public function storeOrder($orderData)
    {
        $order = Order::create($orderData);
        return $order;
    }


    public function addToOrder($orderId, $products = [])
    {
        $order = Order::firstOrFail($orderId);
        foreach ($products as $product) 
        {
            if (isset($product['id'])) 
            {
                if (!isset($product['count']))
                {
                    $product['count'] = 1;
                }

                $productModel = $cart->products()->find($product['id']);

                if (!empty($productModel))
                {
                    $productModel->pivot->count += $product['count'];
                    $productModel->pivot->save();
                }
                else 
                {
                    $order->products()->attach($product['id'], ['count' => $product['count']]);
                }
            }
        } 
        return $order;
    }


    public function removeFromOrder($orderId, $products = [])
    {
        $order = Order::findOrFail($orderId);
        foreach ($products as $product) 
        {
            if (isset($product['id']))
            {
                $order->products()->detach($product['id']);
            }  
        } 
        return $order;
    }


    public function updateOrderCount($orderId, $products = [])
    {
        $order = Order::findOrFail($orderId);
        foreach ($products as $product) 
        {
            if (isset($product['id'])) 
            {
                if (!isset($product['count']))
                {
                    $product['count'] = 1;
                }

                $productModel = $cart->products()->find($product['id']);

                if (!empty($productModel))
                {
                    $productModel->pivot->count += $product['count'];
                    $productModel->pivot->save();
                }
            }
        } 
        return $order;
    }


    public function getUserCart()
    {
        if (Auth::check())
        {
            $userId = Auth::user()->id;

            $cart = Order::where('user_id', $userId)
                ->where('status', Order::STATUS_CART)
                ->with('products')
                ->firstOrCreate([
                    'user_id' => $userId,
                    'status' => Order::STATUS_CART
                ]);
        }
        else 
        {
            $cartId = (int)Cookie::get('cart');

            if (!empty($cartId))
            {
                $cart = Order::find($cartId);
                if (!$cart || ($cart->status != Order::STATUS_CART))
                {
                    Cookie::forget('cart');
                    $cart = null;
                }
            }
            
            if (empty($cart)) 
            {
                $cart = Order::create([
                    'status' => Order::STATUS_CART
                ]);

                Cookie::queue('cart', $cart->id, 129600);
            }
        }

        return $cart;
    }
}