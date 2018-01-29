app.controller('productsController',function($scope, $mdDialog, $mdToast, productsFactory)
{

      $scope.readProducts = function(){
            productsFactory.readProducts().then(function successCallback(response){
            $scope.prod = response.data.data;
            $mdToast.show(
                $mdToast.simple()
                  .textContent('Products loaded!')
                  .position('bottom')
                  .hideDelay(1300)
              );
          },function errorCallback(response){
            $mdToast.show(
                $mdToast.simple()
                  .textContent('Error loading products')
                  .position('top')
                  .hideDelay(1300)
              );
          });
      }

          $scope.sortType = 'title' ;
          $scope.sortReverse = false ;
          $scope.showCreateProductForm = function(event)
          {
              $mdDialog.show({
                controller:DialogController,
                templateUrl:'./products/create_product.template.html',
                parent:angular.element(document.body),
                clickOutsideToClose:true,
                scope:$scope,
                preserveScope:true,
                fullscreen:true
              });
          }

          function DialogController($scope,$mdDialog){
            $scope.cancel=function()
            {
               $mdDialog.cancel();
            };
          }

          $scope.createProduct = function(){
             productsFactory.createProduct($scope).then(function successCallback(response){
                $scope.showToast('Product added successfully');

                $scope.cancel();
                $scope.clearProductForm();
                $scope.readProducts();
             }, function errorCallback(response){
                $scope.cancel();
                $scope.clearProductForm();
                $mdToast.simple().textContent('Failed to add product').position('top').hideDelay('3200');
                //$scope.showToast('ERROR');
             })
          }

          $scope.clearProductForm = function()
          {
            $scope.id = "";
            $scope.name = "";
            $scope.description = "";
            $scope.price = "";
          }

          $scope.showToast = function(messages)
          {
              $mdToast.show($mdToast.simple().textContent(messages).position('top right').hideDelay('2500'));
          }

          $scope.readOneProduct = function (id)
          {
              productsFactory.readOneProduct(id).then(function successCallback(response){
                $scope.id = response.data.data.id;
                $scope.name = response.data.data.title;
                $scope.description = response.data.data.description;
                $scope.price = response.data.data.price;
                $mdDialog.show({
                    controller:DialogController,
                    templateUrl:'./products/read_one_product.template.html',
                    parent:angular.element(document.body),
                    clickOutsideToClose:true,
                    scope:$scope,
                    preserveScope:true,
                    fullscreen:true

                }).then(function(){

                  },function(){
                      $scope.clearProductForm();
                  }
                );

              }, function errorCallback(response){
                $scope.showToast('Unable to fetch product data');
              }
            );
          }

          $scope.showUpdateProductForm = function(id){
              productsFactory.readOneProduct(id).then(function successCallback(response){
                $scope.id = response.data.data.id;
                $scope.name = response.data.data.title;
                $scope.description = response.data.data.description;
                $scope.price = response.data.data.price;

                $mdDialog.show({
                  controller:DialogController,
                  templateUrl:'./products/update_product.template.html',
                  parent:angular.element(document.body),
                  targetEvent:event,
                  clickOutsideToClose:true,
                  scope:$scope,
                  preserveScope:true,
                  fullscreen:true,
                }).then(function(){
                  //user clicked Cancel
                },
                function(){
                    $scope.clearProductForm();
                }
              )

              },function errorCallBack(response){
                //error

              }
            )
          }

          $scope.updateProduct = function(){

            productsFactory.updateProduct($scope).then(function successCallback(response){
               $scope.showToast('Updated Product');
               $scope.readProducts();
               $scope.cancel();
               $scope.clearProductForm();
            },
            function errorCallback(response){
               $scope.showToast('Unable to update product');
            }
          )

          }

          $scope.confirmDeleteProduct = function(event,id){
              $scope.id = id;
              var confirm = $mdDialog.confirm().title('Are you sure?').textContent('Product will be deleted.').targetEvent(event).ok('Yes').cancel('No');
              $mdDialog.show(confirm).then(
                function(){
                  $scope.deleteProduct();
                },function(){

                }
              )
          }


          $scope.deleteProduct = function()
          {
            productsFactory.deleteProduct($scope.id).then(function successCallback(){
              $scope.showToast('Product deleted successfully');
              $scope.readProducts();

            },function errorCallBack(){
                  $scope.showToast('Product deleted successfully');
            }
          )

          }

  });
