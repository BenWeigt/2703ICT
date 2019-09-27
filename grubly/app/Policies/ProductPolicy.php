<?php

namespace grubly\Policies;

use grubly\User;
use grubly\Product;
use grubly\Restaurant;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
	use HandlesAuthorization;

	/**
	 * Determine whether the user can add product to cart.
	 *
	 * @param  \grubly\User  $user
	 * @return mixed
	 */
	public function addToCart(User $user, Product $product)
	{
		// If the cart already contains items, only products from the same restaurant are valid
		// (no split reciepts)
		$cart = session('cart');
		if (!empty($cart) && $cart['restaurant_id'] !== $product->restaurant->id)
			return false;
		return !!($user->type === 'customer' && $product->restaurant->verification);
	}

	/**
	 * Determine whether the user can remove products from the cart.
	 *
	 * @param  \grubly\User  $user
	 * @return mixed
	 */
	public function removeFromCart(User $user)
	{
		// Customers can remove products from their cart
		return !!($user->type === 'customer');
	}

	/**
	 * Determine whether the user can view any products.
	 *
	 * @param  \grubly\User  $user
	 * @return mixed
	 */
	public function viewAny(User $user)
	{
		// Administrators can view any
		return !!($user->type === 'administrator');
	}

	/**
	 * Determine whether the user can view the product.
	 *
	 * @param  \grubly\User  $user
	 * @param  \grubly\Product  $product
	 * @return mixed
	 */
	public function view(?User $user, Product $product)
	{
		// Anyone can view a product for a verified restaurant. Anyone who can view the products restaurant can view the product.
		return !!($product->restaurant->verification || (!empty($user) && $user->can('view', $product->restaurant)));
	}

	/**
	 * Determine whether the user can create products.
	 *
	 * @param  \grubly\User  $user
	 * @return mixed
	 */
	public function create(User $user)
	{
		// User must be a verified restaurant
		$restaurant = Restaurant::find($user->id);
		return !!(!empty($restaurant) && $restaurant->verification);
	}

	/**
	 * Determine whether the user can update the product.
	 *
	 * @param  \grubly\User  $user
	 * @param  \grubly\Product  $product
	 * @return mixed
	 */
	public function update(User $user, Product $product)
	{
		// Product must be owned by the user/restaurant, and restaurant must be verified
		return !!($user->id === $product->restaurant->id && $product->restaurant->verification);
	}

	/**
	 * Determine whether the user can delete the product.
	 *
	 * @param  \grubly\User  $user
	 * @param  \grubly\Product  $product
	 * @return mixed
	 */
	public function delete(User $user, Product $product)
	{
		// Can delete if can update
		return !!($user->can('update', $product));
	}

	/**
	 * Determine whether the user can restore the product.
	 *
	 * @param  \grubly\User  $user
	 * @param  \grubly\Product  $product
	 * @return mixed
	 */
	public function restore(User $user, Product $product)
	{
		// Outside assignment scope
		return !!($user->can('update', $product));
	}

	/**
	 * Determine whether the user can permanently delete the product.
	 *
	 * @param  \grubly\User  $user
	 * @param  \grubly\Product  $product
	 * @return mixed
	 */
	public function forceDelete(User $user, Product $product)
	{
		// Outside assignment scope
		return !!($user->can('update', $product));
	}
}
