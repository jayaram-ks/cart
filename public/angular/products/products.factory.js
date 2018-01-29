app.factory('productsFactory',function($http){
    var factory = {};

    factory.readProducts = function(){
        return $http({method:'GET',url:'http://cart.test/api/v1/products?api_token=ru3b7rc436567gr5367rct346c367cr36cr5673rcg823'});
    }

    factory.createProduct = function($scope)
    {
        return $http({
          method:'POST',
          data:{
              'title': $scope.name,
              'description':$scope.description,
              'price':$scope.price,
              'category_id': 1
          },
          url:'http://cart.test/api/v1/saveproduct?api_token=ru3b7rc436567gr5367rct346c367cr36cr5673rcg823'
        });
    }

    factory.readOneProduct = function(id)
    {
        return $http({
          method:'GET',
          url:"http://cart.test/api/v1/product/"+ id +"?api_token=ru3b7rc436567gr5367rct346c367cr36cr5673rcg823"
        });
    }

    factory.updateProduct = function($scope)
    {
        return $http({
            method:'POST',
            data:{
              'id':$scope.id,
              'title': $scope.name,
              'description': $scope.description,
              'price' : $scope.price,
              'category_id': 1
            },
            url:'http://cart.test/api/v1/updateproduct?api_token=ru3b7rc436567gr5367rct346c367cr36cr5673rcg823'
        });
    }

    factory.deleteProduct = function(id){

      return $http({
        method:'POST',
        data:{
          'id':id,
        },
        url:'http://cart.test/api/v1/deleteproduct?api_token=ru3b7rc436567gr5367rct346c367cr36cr5673rcg823'
      });

    }

    return factory;
});
