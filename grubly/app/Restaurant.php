<?php

namespace grubly;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
	public $timestamps = false;

	public static function allVerified()
	{
		return self::where('verified', true)->get();
	}
	public static function allUnverified()
	{
		return self::where('verified', false)->get();
	}
	
  function product() {
		return $this->hasMany('grubly\Product');
	}
}
