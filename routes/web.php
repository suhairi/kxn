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

Route::get('/', function () {
    return view('auth.login');
})->name('admin.home');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {

	// Car
	Route::resource('car', 'CarController', ['except' => 'show']);

	// Suppliers
	Route::resource('supplier', 'SupplierController');

	// Inventory
	Route::resource('/inventory', 'InventoryController');



	//Stock
	Route::get('/stocks', 'StockController@index')->name('stock.index');

	//Repair
	Route::resource('/repair', 'RepairController');

	//Search
	Route::get('/search', 'SearchController@index')->name('search.index');
	Route::get('/search/inventory', 'SearchController@inventory')->name('search.inventory');
	Route::post('/search/inventory', 'SearchController@inventoryResult')->name('search.inventory.result');

	// Printouts
	Route::get('/printouts/invoice/{id}', 'PrintoutsController@invoice')->name('printouts.invoice');
	Route::get('/printouts/do/{id}', 'PrintoutsController@do')->name('printouts.do');

});

