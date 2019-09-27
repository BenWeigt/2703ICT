<?php

namespace grubly;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use grubly\Purchase;
use grubly\Restaurant;

class Product extends Model
{
	public $timestamps = false;

	protected $fillable = [
		'restaurant_id', 'name', 'price', 'image'
	];
	
	/**
	 * Link to restaurant
	 */
  function restaurant() {
		return $this->belongsTo('grubly\Restaurant');
	}

	/**
	 * Get all products in the currently logged in users cart
	 */
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

	/**
	 * Get the total number of products in the currently logged in users cart
	 */
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

	/**
	 * Get the restaurant that the products in the currently logged in users cart belong to
	 */
	public static function cartRestaurant()
	{
		$cart = session('cart');
		if (empty($cart))
			return null;
		return Restaurant::find($cart['restaurant_id']);
	}

	/**
	 * Add a product to the currently logged in users cart
	 */
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

	/**
	 * Remove a product to the currently logged in users cart
	 */
	public static function removeFromCart(Product $product)
	{
		if (!empty(Auth::user()) && Auth::user()->can('removeFromCart', $product))
		{
			// Get cart, decrement product (or remove if 0)
			$cart = session('cart');
			if (!empty($cart) && isset($cart['products'][$product->id]))
			{
				if ($cart['products'][$product->id] === 1)
					unset($cart['products'][$product->id]);
				else
					$cart['products'][$product->id] -= 1;

				if (!count($cart['products']))
					session(['cart' => null]);
				else
					session(['cart' => $cart]);
			}
			return view('components.cart');
		}
		abort(418); // HTCPCP/1.0
	}

	/**
	 * Clear the currently logged in users cart
	 */
	public static function clearCart()
	{
		session(['cart'=>null]);
	}

	/**
	 * Gets the 5 most popular products over the last 30 days
	 */
	public static function mostPopular()
	{
		$date = \Carbon\Carbon::now()->subDays(30);
		$purchases = Purchase::where('created_at', '>=', date($date))->get();
		$purchaseCounts = [];
		foreach ($purchases as $purchase) {
			foreach ($purchase->products as $product) {
				if (isset($purchaseCounts[$product['id']]))
					$purchaseCounts[$product['id']] += $product['inCart'];
				else 
					$purchaseCounts[$product['id']] = $product['inCart'];
			}
		}
		arsort($purchaseCounts);
		$products = [];
		foreach (array_slice($purchaseCounts, 0, 5, true) as $productId => $count) {
			$products[] = Product::find($productId);
		}
		return collect($products);
	}
}
