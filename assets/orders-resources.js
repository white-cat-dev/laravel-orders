var prefix = '/laravel-orders-api';


app.factory('OrdersRepository', ['$resource', 
  function($resource) { 
    return $resource(prefix, null, 
    {
      getOrders: { method: 'GET', url: prefix },

      getOrder: { method: 'GET', url: prefix + '/:order' },
      updateOrder: { method: 'POST', url: prefix + '/:order' },
      removeOrder: { method: 'DELETE', url: prefix + '/:order' },
      storeOrder: { method: 'POST', url: prefix },

      addToOrder: { method: 'POST', url: prefix + '/:order/add' },
      removeFromOrder: { method: 'POST', url: prefix + '/:order/remove' },
      updateOrderCount: { method: 'POST', url: prefix + '/:order/update_count' },

      getUserCart: { method: 'POST', url: prefix + '/cart' }
    }); 
  }
]);