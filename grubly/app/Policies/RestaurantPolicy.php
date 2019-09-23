<?php

namespace grubly\Policies;

use grubly\User;
use grubly\Restaurant;
use Illuminate\Auth\Access\HandlesAuthorization;

class RestaurantPolicy
{
	use HandlesAuthorization;
	
	/**
	 * Determine whether the user can view all restaurants.
	 *
	 * @param  \grubly\User  $user
	 * @return mixed
	 */
	public function viewAny(User $user)
	{
		return !!($user->type === 'administrator');
	}

	/**
	 * Determine whether the user can view the restaurant.
	 *
	 * @param  \grubly\User  $user
	 * @param  \grubly\Restaurant  $restaurant
	 * @return mixed
	 */
	public function view(?User $user, Restaurant $restaurant)
	{
		return !!($restaurant->verification || (!empty($user) && ($user->type === 'administrator' || $user->id === $restaurant->id)));
	}

	/**
	 * Determine whether the user can create restaurants.
	 *
	 * @param  \grubly\User  $user
	 * @return mixed
	 */
	public function create(User $user)
	{
		return !!(empty($user));
	}

	/**
	 * Determine whether the user can update the restaurant.
	 *
	 * @param  \grubly\User  $user
	 * @param  \grubly\Restaurant  $restaurant
	 * @return mixed
	 */
	public function update(User $user, Restaurant $restaurant)
	{
		return !!($user->id === $restaurant->id);
	}

	/**
	 * Determine whether the user can delete the restaurant.
	 *
	 * @param  \grubly\User  $user
	 * @param  \grubly\Restaurant  $restaurant
	 * @return mixed
	 */
	public function delete(User $user, Restaurant $restaurant)
	{
		return false;
	}

	/**
	 * Determine whether the user can restore the restaurant.
	 *
	 * @param  \grubly\User  $user
	 * @param  \grubly\Restaurant  $restaurant
	 * @return mixed
	 */
	public function restore(User $user, Restaurant $restaurant)
	{
		return false;
	}

	/**
	 * Determine whether the user can permanently delete the restaurant.
	 *
	 * @param  \grubly\User  $user
	 * @param  \grubly\Restaurant  $restaurant
	 * @return mixed
	 */
	public function forceDelete(User $user, Restaurant $restaurant)
	{
		return false;
	}
}
