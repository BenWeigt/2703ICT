<?php

namespace grubly;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
	public $timestamps = false;
	
  function restaurant() {
		return $this->belongsTo('grubly\Restaurant');
	}

	public static function allInCart()
	{
		$cart = session('cart');
		if (empty($cart) || !count($cart['products']))
		{
			return collect([]);
		}
		$products = static::whereIn('id', array_keys($cart['products']))->get();
		foreach ($products as $product)
		{
			// This assignment is fine when not in strict mode
			$product->inCart = $cart['products'][$product->id];
		}
		return $products;
	}

	public static function totalInCart()
	{
		$cart = session('cart');
		if (empty($cart))
		{
			return 0;
		}
		$count = 0;
		foreach ($cart['products'] as $value) {
			$count += $value;
		}
		return $count;
	}

	public static function addToCart(Product $product)
	{
		if (!empty(Auth::user()) && Auth::user()->can('addToCart', $product))
		{
			// Get or initialse cart
			$cart = session('cart');
			if (empty($cart))
			{
				$cart = [
					'restaurant_id' => $product->restaurant->id,
					'products' => []
				];
			}

			// Add to cart
			$cart['products'][$product->id] = isset($cart['products'][$product->id]) ? $cart['products'][$product->id] + 1 : 1;
			session(['cart' => $cart]);
			return view('components.cart');
		}
		abort(418); // HTCPCP/1.0
	}

	public static function clearCart()
	{
		session(['cart'=>null]);
	}
}
