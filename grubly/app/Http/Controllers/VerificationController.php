<?php

namespace grubly\Http\Controllers;

use grubly\Verification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use grubly\Restaurant;

class VerificationController extends Controller
{
	public function verify(Request $request)
	{
		// Authenticate and verify
		$user = Auth::user();
		$restaurant = Restaurant::find($request->id);
		if (empty($user) || empty($restaurant))
			return abort(404);
		if ($user->type !== 'administrator')
			return abort(403);
		if (!empty($restaurant->verification))
			return back();
		(Verification::create(['restaurant_id' => $restaurant->id]))->save();

		return back();
	}

	public function unverify(Request $request)
	{
		// Authenticate and unverify
		$user = Auth::user();
		$restaurant = Restaurant::find($request->id);
		if (empty($user) || empty($restaurant))
			return abort(404);
		if ($user->type !== 'administrator')
			return abort(403);
		if (empty($restaurant->verification))
			return back();
		$restaurant->verification()->delete();
		
		return back();
	}
}
