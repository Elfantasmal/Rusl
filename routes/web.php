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

# Index
Route::get('/index', 'Admin\IndexController@index')->name('index');

# User
Route::resource('/users', 'Admin\UserController');
Route::get('/users/search/{keyword}', 'Admin\UserController@search')->name('users.search');

# Role
Route::resource('/roles', 'Admin\RoleController');
Route::get('/roles/search/{keyword}', 'Admin\RoleController@search')->name('roles.search');

# Permission
Route::resource('/permissions', 'Admin\PermissionController');
Route::get('/permissions/search/{keyword}', 'Admin\PermissionController@search')->name('permissions.search');

# Customers
Route::resource('/customers', 'Admin\CustomerController');
Route::get('/customers/{id}/address', 'Admin\CustomerController@address')->name('customers.address');
Route::get('/customers/search/{keyword}', 'Admin\CustomerController@search')->name('customers.search');

# Suppliers
Route::resource('/suppliers', 'Admin\SupplierController');
Route::get('/suppliers/search/{keyword}', 'Admin\SupplierController@search')->name('suppliers.search');

# Commodities
Route::resource('/commodities', 'Admin\CommodityController');
Route::get('/commodities/{commodity}/info', 'Admin\CommodityController@info');
Route::get('/commodities/supplier/{supplier_id}', 'Admin\CommodityController@commoditiesSupplier');
Route::get('/commodities/search/{keyword}', 'Admin\CommodityController@search')->name('commodities.search');

# Purchase Orders
Route::resource('/purchase_orders', 'Admin\PurchaseOrderController');
Route::get('/purchase_orders/search/{keyword}', 'Admin\PurchaseOrderController@search')->name('purchase_orders.search');

# Sales Orders
Route::resource('/sales_orders', 'Admin\SalesOrderController');
Route::get('/sales_orders/search/{keyword}', 'Admin\SalesOrderController@search')->name('sales_orders.search');

# Stock
Route::resource('/stocks', 'Admin\StockController');
Route::get('/stocks/search/{keyword}', 'Admin\StockController@search')->name('stocks.search');

# Stock In
Route::resource('/stock_in', 'Admin\StockInController');
Route::get('/stock_in/search/{keyword}', 'Admin\StockInController@search')->name('stock_in.search');

# Stock Out
Route::resource('/stock_out', 'Admin\StockOutController');
Route::get('/stock_out/search/{keyword}', 'Admin\StockOutController@search')->name('stock_out.search');
