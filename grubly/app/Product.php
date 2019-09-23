<?php

namespace grubly;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public $timestamps = false;
	
  function restaurant() {
		return $this->belongsTo('grubly\Restaurant');
	}
}
