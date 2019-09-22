<?php

namespace grubly;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
	public $timestamps = false;

	/**
	 * Returns a collection of all verified Restaurants
	 */
	public static function allVerified()
	{
		return self::where('verified', true)->get();
	}

	/**
	 * Returns a collection of all unverified Restaurants
	 */
	public static function allUnverified()
	{
		return self::where('verified', false)->get();
	}
	
	/**
	 * Link a User (type manager) to this Restaurant (one to one)
	 */
  function manager() {
		return $this->belongsTo('grubly\User', 'user_id');
	}
	
	/**
	 * Link products to this Restaurant (one to many)
	 */
  function products() {
		return $this->hasMany('grubly\Product');
	}
}
