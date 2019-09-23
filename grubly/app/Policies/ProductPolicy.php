<?php

namespace grubly\Policies;

use grubly\User;
use grubly\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
	use HandlesAuthorization;

	/**
	 * Determine whether the user can view any products.
	 *
	 * @param  \grubly\User  $user
	 * @return mixed
	 */
	public function viewAny(User $user)
	{
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
		return !!($user->type === 'restaurant');
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
		return !!($user->id === $product->restaurant->id);
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
		return !!($user->id === $product->restaurant->id);
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
		return !!($user->id === $product->restaurant->id);
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
		return !!($user->id === $product->restaurant->id);
	}
}
