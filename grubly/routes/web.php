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

	// Generates all authentication routes
	Auth::routes();

	// About doc
	Route::get('/', function() {
		return view('about.about');
	});

	// Root gets handled by RestaurantController->index and is also given the name 'home' for ease of redirects
	Route::get('/about', 'RestaurantController@index')->name('home');

	// Connect add/remove/clear cart
	Route::post('cart/add', 'ProductController@addToCart')->name('addToCart');
	Route::post('cart/remove', 'ProductController@removeFromCart')->name('removeFromCart');
	Route::post('cart/clear', 'ProductController@clearCart')->name('clearCart');

	// Connect administrators restaurant verify/unverify endpoints
	Route::post('verification/verify', 'VerificationController@verify')->name('verify');
	Route::post('verification/unverify', 'VerificationController@unverify')->name('unverify');

	// Connect ProductController, RestaurantController and PurchaseController CRUD
	Route::resources([
		'products' => 'ProductController',
		'restaurants' => 'RestaurantController',
		'purchases' => 'PurchaseController'
	]);