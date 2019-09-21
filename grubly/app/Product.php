<?php

namespace grubly;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public $timestamps = false;
	
  function manufacturer() {
		return $this->belongsTo('grubly\Manufacturer');
	}
}
