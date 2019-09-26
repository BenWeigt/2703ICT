<?php

namespace grubly;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
	protected $casts = [
		'products' => 'array',
		'address' => 'array'
	];

	function user()
	{
		return $this->belongsTo('grubly\User');
	}
}
