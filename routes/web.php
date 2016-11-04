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

Route::resource('/users', 'Admin\UserController');

Route::resource('/customers', 'Admin\CustomerController');

Route::resource('/suppliers', 'Admin\SupplierController');

Route::resource('/products', 'Admin\ProductController');

Route::resource('/purchase_orders', 'Admin\PurchaseOrderController');

Route::resource('/sales_orders', 'Admin\SalesOrderController');

/*
 *       | GET|HEAD  | suppliers                    | suppliers.index      | App\Http\Controllers\Admin\SupplierController@index                    | web          |
 *       | POST      | suppliers                    | suppliers.store      | App\Http\Controllers\Admin\SupplierController@store                    | web          |
 *       | GET|HEAD  | suppliers/create             | suppliers.create     | App\Http\Controllers\Admin\SupplierController@create                   | web          |
 *       | DELETE    | suppliers/{supplier}         | suppliers.destroy    | App\Http\Controllers\Admin\SupplierController@destroy                  | web          |
 *       | GET|HEAD  | suppliers/{supplier}         | suppliers.show       | App\Http\Controllers\Admin\SupplierController@show                     | web          |
 *       | PUT|PATCH | suppliers/{supplier}         | suppliers.update     | App\Http\Controllers\Admin\SupplierController@update                   | web          |
 *       | GET|HEAD  | suppliers/{supplier}/edit    | suppliers.edit       | App\Http\Controllers\Admin\SupplierController@edit                     | web          |
 */