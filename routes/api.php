<?php

use App\Product;
use App\User;
use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\UserCollection;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::group(['prefix'=>'v1'],function(){
//
//       Route::get('product/{id}',function($id = '2'){
//           return new ProductResource(Product::find($id));
//       });
//
//       Route::get('products/',function(){
//           $products = Product::all();
//           return new ProductCollection($products);
//       });
//
//       Route::get('user/{id}',function($id='2'){
//           return new UserResource(User::find($id));
//       });
//       Route::get('users',function(){
//           return new UserCollection(User::all());
//       });
//       Route::post('user',function(){
//           return new UserCollection(User::all());
//       });
// });
//for token authentication method



Route::group(['prefix'=>'v1','middleware'=>'auth:api'],function(){

      Route::get('product/{id}',function($id = '2'){
          return new ProductResource(Product::find($id));
      });

      Route::get('products/',function(){
          $products = Product::all();
          return new ProductCollection($products);
      });

      Route::post('saveproduct/','Api\ProductController@saveProduct');
      Route::post('updateproduct/','Api\ProductController@updateProduct');
      Route::post('deleteproduct/','Api\ProductController@deleteProduct');

      Route::get('user/{id}',function($id='2'){
          return new UserResource(User::find($id));
      });
      Route::get('users',function(){
          return new UserCollection(User::all());
      });


});
