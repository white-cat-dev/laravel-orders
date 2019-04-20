<?php

namespace WhiteCatDev\LaravelOrders\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use WhiteCatDev\LaravelOrders\Services\OrdersService;


class ApiOrdersController extends Controller
{
    protected $ordersService;

    public function __construct(OrdersService $ordersService)
    {
        parent::__construct();
        $this->ordersService = $ordersService;
    }


    public function getOrders(Request $request)
    {
    	return $this->ordersService->getOrders($request->all());
    }


    public function getOrder(Request $request)
    {
    	$orderId = $request->route('offer');
    	return $this->ordersService->getOrder($orderId);
    }


    public function updateOrder(Request $request)
    {
    	$orderId = $request->route('offer');
    	return $this->ordersService->updateOrder($orderId, $request->all());
    }


    public function removeOrder(Request $request)
    {
    	$orderId = $request->route('offer');
    	return $this->ordersService->removeOrder($orderId);
    }


    public function storeOrder(Request $request)
    {
    	return $this->ordersService->storeOrder($request->all());
    }


    public function addToOrder(Request $request)
    {
    	$orderId = $request->route('offer');
    	$products = $request->get('products');
    	return $this->ordersService->addToOrder($orderId, $products);
    }


    public function removeFromOrder(Request $request)
    {
    	$orderId = $request->route('offer');
    	$products = $request->get('products');
    	return $this->ordersService->removeFromOrder($orderId, $products);
    }


    public function updateOrderCount(Request $request)
    {
    	$orderId = $request->route('offer');
    	$products = $request->get('products');
    	return $this->ordersService->updateOrderCount($orderId, $products);
    }

    public function getUserCart(Request $request)
    {
    	return $this->ordersService->getUserCart();
    }
}
