<?php

namespace grubly\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use grubly\Product;
use grubly\Restaurant;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
			//
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		Blade::if('customer', function () {
			$user = Auth::user();
			return !!(!empty($user) && $user->type === 'customer');
		});
		Blade::if('cart', function () {
			return !!(Product::totalInCart());
		});
		Blade::if('isrestaurant', function () {
			$user = Auth::user();
			return !!(!empty($user) && $user->type === 'restaurant');
		});
	}
}
