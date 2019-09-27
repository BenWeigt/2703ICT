<?php

namespace grubly\Policies;

use grubly\User;
use grubly\Purchase;
use grubly\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class PurchasePolicy
{
	use HandlesAuthorization;
	
	/**
	 * Determine whether the user can view any purchases.
	 *
	 * @param  \grubly\User  $user
	 * @return mixed
	 */
	public function viewAny(User $user)
	{
		// Administrators can see all
		return !!($user->type === 'administrator');
	}

	/**
	 * Determine whether the user can view the purchase.
	 *
	 * @param  \grubly\User  $user
	 * @param  \grubly\Purchase  $purchase
	 * @return mixed
	 */
	public function view(User $user, Purchase $purchase)
	{
		// Administrators can see all, users can see their own purchases, restaurants can see all purchases made to them
		return !!($user->type === 'administrator' || $purchase->user->id === $user->id || $purchase->restaurant->id === $user->id);
	}

	/**
	 * Determine whether the user can create purchases.
	 *
	 * @param  \grubly\User  $user
	 * @return mixed
	 */
	public function create(User $user)
	{
		// Customers with products in their cart can purchase
		return !!($user->type === 'customer' && count(Product::allInCart()));
	}

	/**
	 * Determine whether the user can update the purchase.
	 *
	 * @param  \grubly\User  $user
	 * @param  \grubly\Purchase  $purchase
	 * @return mixed
	 */
	public function update(User $user, Purchase $purchase)
	{
		// Immutable
		return false;
	}

	/**
	 * Determine whether the user can delete the purchase.
	 *
	 * @param  \grubly\User  $user
	 * @param  \grubly\Purchase  $purchase
	 * @return mixed
	 */
	public function delete(User $user, Purchase $purchase)
	{
		// Immutable
		return false;
	}

	/**
	 * Determine whether the user can restore the purchase.
	 *
	 * @param  \grubly\User  $user
	 * @param  \grubly\Purchase  $purchase
	 * @return mixed
	 */
	public function restore(User $user, Purchase $purchase)
	{
		// Immutable
		return false;
	}

	/**
	 * Determine whether the user can permanently delete the purchase.
	 *
	 * @param  \grubly\User  $user
	 * @param  \grubly\Purchase  $purchase
	 * @return mixed
	 */
	public function forceDelete(User $user, Purchase $purchase)
	{
		// Immutable
		return false;
	}
}
