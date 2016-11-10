<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/index', 'Admin\IndexController@index');

//User
Route::resource('/users', 'Admin\UserController');

//Customers
Route::resource('/customers', 'Admin\CustomerController');

//Suppliers
Route::resource('/suppliers', 'Admin\SupplierController');
Route::get('/suppliers/search/{keyword}', 'Admin\SupplierController@search');

//Products
Route::resource('/products', 'Admin\ProductController');

//Purchase Orders
Route::resource('/purchase_orders', 'Admin\PurchaseOrderController');

//Sales Orders
Route::resource('/sales_orders', 'Admin\SalesOrderController');