<?php

namespace grubly;

use Illuminate\Database\Eloquent\Model;
use grubly\Restaurant;
use Illuminate\Support\Facades\Auth;

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

	public static function getSalesReport()
	{
		$restaurant = Restaurant::find(Auth::user()->id);
		$weeklyTotals = [];
		for ($i=0; $i < 12; $i++) {
			$purchases = $restaurant->purchases()->whereBetween('created_at', [
				\Carbon\Carbon::now()->subDays($i*7 +7)->startOfDay()->toDateTimeString(),
				\Carbon\Carbon::now()->subDays($i*7)->endOfDay()->toDateTimeString()
			])->get();
			$weeklyTotals[] = $purchases->sum('total');
		}
		return [
			'weekly' => $weeklyTotals,
			'max' => max($weeklyTotals),
			'running' => $restaurant->purchases->sum('total')
		];
	}
}
