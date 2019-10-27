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
Auth::routes();

Route::get('/', 'Auth\LoginController@index')->name('welcome');
Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::middleware('web')->group(function () {

	Route::get('/dashboard', 'Controller@dashboard')->name('dashboard');
	Route::get('/home', 'Controller@dashboard')->name('home');

	// product route 
	Route::get('/products', 'ProductController@index')->name('products');
	Route::post('/generateBareCode', 'ProductController@generate_BareCode')->name('generateBareCode');
	Route::get('/AddProduct/{id}', 'ProductController@showIndex')->name('AddProduct');
	Route::post('/deleteProduct', 'ProductController@removeProduct')->name('deleteProduct');
	Route::post('/StoreProduct', 'ProductController@store')->name('StoreProduct');
	Route::post('/AddStock', 'ProductController@AddStock')->name('AddStock');
	Route::post('/generateBareCode', 'ProductController@generate_BareCode')->name('generateBareCode');
	//Route::get('/printCodeBar/{id}', 'ProductController@printCodeBar')->name('printCodeBar');
	// histoque 
	Route::get('/details/{id}', 'ProductController@showDetails')->name('details');

	// users route
	Route::get('/users', 'UserController@index')->name('users');
	Route::post('/addUser', 'UserController@addUser')->name('addUser');
	Route::post('/editUser', 'UserController@editUser')->name('editUser');
	Route::post('/deleteUser', 'UserController@removeUser')->name('deleteUser');
	Route::get('/user/{id}', 'UserController@showUser')->name('user');


	// profile route
	Route::get('/updateUser', 'UserController@updateUser');
	Route::get('/profile','UserController@profile')->name('profile');




	// clients route
	Route::get('/clients', 'ClientController@index')->name('clients');
	Route::post('/addClient', 'ClientController@addClient');
	Route::post('/editClient', 'ClientController@editClient')->name('editClient');
	Route::get('/updateClient/{id}', 'ClientController@showIndex')->name('updateClient');
	Route::post('/updateClient', 'ClientController@updateClient');
	Route::post('/deleteClient', 'ClientController@removeClient')->name('deleteClient');
	Route::get('/client/{id}', 'ClientController@showClient')->name('Client');
	Route::post('/addCreditClient', 'ClientController@addCreditClient')->name('addCreditClient');

	// Orders route
	Route::get('/orders', 'OrderController@index')->name('orders');
	Route::get('/order/{id}', 'OrderController@showOrder')->name('order');
	Route::get('/cancelOrder', 'OrderController@cancelOrder')->name('cancelOrder');
	Route::post('/confirmerCommande', 'OrderController@store');
	Route::post('/ClientCommande', 'OrderController@storeForClient');
	Route::post('/addCart', 'OrderController@addCart')->name('addCart');
	Route::post('/addCartPlus', 'OrderController@addCartPlus')->name('addCartPlus');
	Route::post('/addCartStock', 'OrderController@addCartStock')->name('addCartStock');
	Route::post('/deleteItem', 'OrderController@deleteItem')->name('deleteItem');

	// credit 
	//Route::post('/addCredit', 'CreditController@store');


	// statistics
	Route::get('/statistics','StatisticsController@ShowStatistics')->name('statistics');

	// Providers route
	Route::get('/providers', 'ProviderController@index')->name('providers');
	Route::post('/addProvider', 'ProviderController@addProvider')->name('addProvider');
	Route::post('/editProviderStatus', 'ProviderController@editProviderStatus')->name('editProviderStatus');
	Route::get('/provider/{id}', 'ProviderController@showProvider')->name('provider');
	Route::get('/providerDetails/{id}', 'ProviderController@showProviderDetails')->name('providerDetails');
	Route::get('/AddProvider/{id}', 'ProviderController@showIndex')->name('AddProvider');
	Route::post('/StoreProvider', 'ProviderController@store')->name('StoreProvider');
	Route::post('/addCreditProvider', 'ProviderController@addCreditProvider')->name('addCreditProvider');

	// Order Provider
	Route::get('/orderProvider', 'OrderProviderController@index')->name('orderProvider');
	Route::post('/addCartProvider', 'OrderProviderController@addCart')->name('addCartProvider');
	Route::post('/addCartPlusProvider', 'OrderProviderController@addCartPlus')->name('addCartPlusProvider');
	Route::get('/cancelOrderProvider', 'OrderProviderController@cancelOrder')->name('cancelOrder');
	Route::post('/deleteItemProvider', 'OrderProviderController@deleteItem')->name('deleteItem');
	Route::post('/addCartStockProvider', 'OrderProviderController@addCartStock')->name('addCartStockProvider');
	Route::post('/deleteItemProvider', 'OrderProviderController@deleteItem')->name('deleteItemProvider');
	Route::post('/confirmerCommandeAchat', 'OrderProviderController@store');
	Route::post('/ClientCommandeProvider', 'OrderProviderController@storeForProvider');
	Route::post('/updatePriceA', 'OrderProviderController@updatePriceA')->name('updatePriceA');
	Route::post('/updatePriceV', 'OrderProviderController@updatePriceV')->name('updatePriceV');


	// store 
	Route::get('/stores', 'StoreController@index')->name('stores');
	Route::post('/addStore', 'StoreController@addStore')->name('addStore');
	Route::post('/editStore', 'StoreController@editStore')->name('editStore');
	Route::get('/store/{id}', 'StoreController@showStore')->name('showStore');
	Route::get('/storeOrder/{id}', 'StoreController@storeOrder')->name('showStore');
	Route::post('/editPriceV', 'StoreController@editPriceV')->name('editPriceV');
	Route::post('/addCreditStore', 'StoreController@addCreditStore')->name('addCreditStore');
	Route::post('/paidOrderStore', 'StoreController@paidOrderStore')->name('paidOrderStore');


});

