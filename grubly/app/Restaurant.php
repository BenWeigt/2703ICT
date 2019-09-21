<?php

namespace grubly;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
	public $timestamps = false;
	
  function product() {
		return $this->hasMany('grubly\Product');
	}
}
