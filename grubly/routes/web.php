<?php
	// Const for simplifying link creation. Update if project is installed or moved.
	define('REL_DIR', '/2703ICT/grubly/public');
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
// Root gets handled by RestaurantController->index and is also given the name 'home' for ease of redirects
Route::get('/', 'RestaurantController@index')->name('home');
// Connect add/remove/clear cart
Route::post('cart/add', 'ProductController@addToCart')->name('addToCart');
Route::post('cart/remove', 'ProductController@removeFromCart')->name('removeFromCart');
Route::post('cart/clear', 'ProductController@clearCart')->name('clearCart');

Route::post('verification/verify', 'VerificationController@verify')->name('verify');
Route::post('verification/unverify', 'VerificationController@unverify')->name('unverify');

// Connect ProductController and RestaurantController CRUD
Route::resources([
	'products' => 'ProductController',
	'restaurants' => 'RestaurantController'
]);