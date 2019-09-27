<?php

namespace grubly\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use grubly\Restaurant;

class RestaurantController extends Controller
{
	public function __construct()
	{
		// Gate with RestaurantPolicy
		$this->authorizeResource(Restaurant::class);
	}
		
	/**
	 * Display all Restaurants.
	 * Note: authorizeResource() does not map index() to any policy. That is appropriate here, as
	 * any user can view the restaurant index page - however inside the page, we will check the 
	 * Restaurant policy for restaurants without verification, and only display those that are 
	 * alowed.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('restaurants.index');
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
