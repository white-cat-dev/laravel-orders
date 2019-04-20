app.controller('OrdersController', [
  '$scope',
  'OrdersRepository',
  function($scope, OrdersRepository) 
  {
  	$scope.order = {};
    $scope.orders = {};


    $scope.getOrders = function(query)
    {
      var request = query;

      OrdersRepository.getOrders(request, function(response) 
      {
        $scope.orders = response;
      });
    };


    $scope.getOrder = function(orderId)
    {
      if (!orderId)
        return;

      var request = {
        'order': orderId
      };

      OrdersRepository.getOrder(request, function(response) 
      {
        $scope.order = response;
      });
    };


    $scope.updateOrder = function(orderId, orderData)
    {
      orderId = orderId || $scope.order.id;
      if (!orderId)
        return;

      var request = orderData;
      request.order = orderId;

      OrdersRepository.updateOrder(request, function(response) 
      {
        $scope.order = response;
      });
    };


    $scope.removeOrder = function(orderId)
    {
      orderId = orderId || $scope.order.id;
      if (!orderId)
        return;

      var request = {
        'order': orderId
      };

      OrdersRepository.removeOrder(request, function(response) 
      {
        $scope.order = response;
      });
    };


    $scope.storeOrder = function(orderData)
    {
      var request = orderData;

      OrdersRepository.storeOrder(request, function(response) 
      {
        $scope.order = response;
      });
    };


    $scope.addToOrder = function(product)
    {
      var request = {
        'products': [
          {
            'id': product.id,
            'count': product.pivot.count
          }
        ]
      };

      OrdersRepository.addToOrder(request, function(response) 
      {
        $scope.order = response;
      });
    };


    $scope.removeFromOrder = function(product)
    {
      var request = {
        'products': [
          {
            'id': product.id
          }
        ]
      };

      OrdersRepository.removeFromOrder(request, function(response) 
      {
        $scope.order = response;
      });
    };


    $scope.updateOrderCount = function(product, count) 
    {
      product.pivot.count = parseInt(product.pivot.count) + count;

      if ((isNaN(product.pivot.count)) || (product.pivot.count < 0)) 
      {
        product.pivot.count = 0;
      }

      var request = {
        'id': product.id,
        'count': product.pivot.count
      };

      OrdersRepository.updateOrderCount(request, function(response) 
      {
        $scope.order = response;
      });
    };


    $scope.getUserCart = function()
    {
      OrdersRepository.getUserCart(function(response) 
      {
        $scope.order = response;
      });
    };
  }
]);
