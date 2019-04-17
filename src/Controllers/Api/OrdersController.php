<?php

namespace WhiteCatDev\LaravelOrders\Controllers\Api;

use Illuminate\Http\Request;
use WhiteCatDev\LaravelOrders\Services\OrdersService;


class OrdersController extends Controller
{
    public function getOrders(Request $request, OrdersService $ordersService) 
    {
    	return $ordersService->getItems();
    }


    public function getOrder(Request $request, $order, OrdersService $ordersService) 
    {
    	return $ordersService->getItemById($order);
    }


    public function updateOrder(Request $request, $order, OrdersService $ordersService) 
    {
    	//
    }


    public function deleteOrder(Request $request, $order, OrdersService $ordersService) 
    {
    	//
    }


    public function storeOrder(Request $request, OrdersService $ordersService) 
    {
    	//
    }
}
