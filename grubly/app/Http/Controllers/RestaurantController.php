<?php

namespace grubly\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use grubly\Restaurant;


class RestaurantController extends Controller
{
	public function __construct()
	{
		$this->authorizeResource(Restaurant::class);
	}
		
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		// Everyone can view verified restaurants
		$data = ['restaurants' => Restaurant::allVerified()];

		// Administrators can view unverified restaurants
		if (!empty(Auth::user()) && Auth::user()->can('viewAll', Restaurant::class))
			$data['unverifiedRestaurants'] = Restaurant::allUnverified();

		return view('restaurants.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Restaurant $restaurant
	 * @return \Illuminate\Http\Response
	 */
	public function show(Restaurant $restaurant)
	{
		return empty($restaurant) ? abort(404) : view('restaurants.show', ['restaurant' => $restaurant]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Restaurant $restaurant
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Restaurant $restaurant)
	{
		return empty($restaurant) ? abort(404) : view('restaurants.edit', ['restaurant' => $restaurant]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  Restaurant $restaurant
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Restaurant $restaurant)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Restaurant $restaurant
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Restaurant $restaurant)
	{
		//
	}
}
