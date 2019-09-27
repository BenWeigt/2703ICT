<?php

namespace grubly;
use grubly\Product;

class Restaurant extends User
{
	protected $table = 'users';
	public static function boot()
	{
		parent::boot();
		// Extend restaurant from user
		static::addGlobalScope(function ($query) {
			$query->where('type', 'restaurant');
		});
	}

	/**
	 * Get all verified restaurants
	 */
	public static function allVerified()
	{
		return static::has('verification')->get();
	}

	/**
	 * Get all unverified restaurants
	 */
	public static function allUnverified()
	{
		return static::doesnthave('verification')->get();
	}

	/**
	 * Link products to this Restaurant (one to many)
	 */
  function products() {
		return $this->hasMany('grubly\Product');
	}

	/**
	 * Link purchases to this Restaurant (one to many)
	 */
  function purchases() {
		return $this->hasMany('grubly\Purchase');
	}

	/**
	 * Link verification
	 */
	function verification() {
		return $this->hasOne('grubly\Verification');
	}
}
