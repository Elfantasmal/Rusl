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

# Role
Route::resource('/roles', 'Admin\RoleController');

# Permission
Route::resource('/permissions', 'Admin\PermissionController');

# Customers
Route::resource('/customers', 'Admin\CustomerController');
Route::get('/customers/{id}/address', 'Admin\CustomerController@address')->name('customers.address');

# Suppliers
Route::resource('/suppliers', 'Admin\SupplierController');

# Commodities
Route::resource('/commodities', 'Admin\CommodityController');
Route::get('/commodities/{commodity}/info', 'Admin\CommodityController@info');
Route::get('/commodities/supplier/{supplier_id}', 'Admin\CommodityController@commoditiesSupplier');

# Purchase Orders
Route::resource('/purchase_orders', 'Admin\PurchaseOrderController');

# Sales Orders
Route::resource('/sales_orders', 'Admin\SalesOrderController');

# Stock
Route::resource('/stocks', 'Admin\StockController');

# Stock In
Route::resource('/stock_in', 'Admin\StockInController');

# Stock Out
Route::resource('/stock_out', 'Admin\StockOutController');