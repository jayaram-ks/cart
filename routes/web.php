<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//Users/Customers/Sellers
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout','Auth\LoginController@userLogout')->name('user.logout');

//Admin

Route::group(['prefix'=>'admin'],function(){

	Route::get('/','Admin\AdminController@index')->name('admin.dashboard');
	Route::get('/profile','Admin\AdminController@showProfile')->name('admin.profile');
	Route::post('/profile','Admin\AdminController@updateProfile')->name('admin.profileupdate');

	Route::get('/category','Admin\CategoryController@manageCategory')->name('admin.managecategory');
	Route::post('/category','Admin\CategoryController@addCategory')->name('admin.addcategory');

	Route::get('/product','Admin\ProductController@manageProduct')->name('admin.manageproduct');
	Route::get('/addproduct','Admin\ProductController@addProduct')->name('admin.addproduct');



	Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');

  Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
  Route::post('/password/reset','Auth\AdminResetPasswordController@reset');


});
