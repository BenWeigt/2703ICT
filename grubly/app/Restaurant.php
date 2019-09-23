<?php

namespace grubly;

class Restaurant extends User
{
	protected $table = 'users';
	public static function boot()
	{
		parent::boot();
		static::addGlobalScope(function ($query) {
			$query->where('type', 'restaurant');
		});
	}

	/**
	 * Link products to this Restaurant (one to many)
	 */
  function products() {
		return $this->hasMany('grubly\Product');
	}

	function verification() {
		return $this->hasOne('grubly\Verification');
	}
}
