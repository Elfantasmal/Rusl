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

Route::group(['middleware' => ['auth', 'auth.admin']], function () {
    # Index
    Route::get('/index', 'Admin\IndexController@index')->name('index');

    # User
    Route::group(['middleware' => ['role:developer|admin']], function () {
        Route::resource('/users', 'Admin\UserController');
        Route::get('/users/search/{keyword}', 'Admin\UserController@search')->name('users.search');
    });

    # Role & Permission
    Route::group(['middleware' => ['role:developer|admin|auth_manager']], function () {
        Route::resource('/roles', 'Admin\RoleController');
        Route::get('/roles/search/{keyword}', 'Admin\RoleController@search')->name('roles.search');

        Route::resource('/permissions', 'Admin\PermissionController');
        Route::get('/permissions/search/{keyword}', 'Admin\PermissionController@search')->name('permissions.search');
    });

    # Customers
    Route::group(['middleware' => ['role:developer|admin|customer_manager']], function () {
        Route::resource('/customers', 'Admin\CustomerController');
        Route::get('/customers/{id}/address', 'Admin\CustomerController@address')->name('customers.address');
        Route::get('/customers/search/{keyword}', 'Admin\CustomerController@search')->name('customers.search');
    });

    # Suppliers
    Route::group(['middleware' => ['role:developer|admin|supplier_manager']], function () {
        Route::resource('/suppliers', 'Admin\SupplierController');
        Route::get('/suppliers/search/{keyword}', 'Admin\SupplierController@search')->name('suppliers.search');

    });

    # Commodities
    Route::group(['middleware' => ['role:developer|admin|commodity_manager']], function () {
        Route::resource('/commodities', 'Admin\CommodityController');
        Route::get('/commodities/{commodity}/info', 'Admin\CommodityController@info');
        Route::get('/commodities/supplier/{supplier_id}', 'Admin\CommodityController@commoditiesSupplier');
        Route::get('/commodities/search/{keyword}', 'Admin\CommodityController@search')->name('commodities.search');
    });


    # Purchase Orders
    Route::group(['middleware' => ['role:developer|admin|purchaser']], function () {
            Route::resource('/purchase_orders', 'Admin\PurchaseOrderController');
            Route::get('/purchase_orders/search/{keyword}', 'Admin\PurchaseOrderController@search')->name('purchase_orders.search');
    });

    # Sales Orders
    Route::group(['middleware' => ['role:developer|admin|salesman']], function () {
        Route::resource('/sales_orders', 'Admin\SalesOrderController');
        Route::get('/sales_orders/search/{keyword}', 'Admin\SalesOrderController@search')->name('sales_orders.search');
    });


    # Stock & Stock In & Stock Out
    Route::group(['middleware' => ['role:developer|admin|warehouse_manager']], function () {
        Route::resource('/stocks', 'Admin\StockController');
        Route::get('/stocks/search/{keyword}', 'Admin\StockController@search')->name('stocks.search');

        Route::resource('/stock_in', 'Admin\StockInController');
        Route::get('/stock_in/search/{keyword}', 'Admin\StockInController@search')->name('stock_in.search');

        Route::resource('/stock_out', 'Admin\StockOutController');
        Route::get('/stock_out/search/{keyword}', 'Admin\StockOutController@search')->name('stock_out.search');
    });

});