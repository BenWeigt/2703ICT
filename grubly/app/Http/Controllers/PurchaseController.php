<?php

namespace grubly\Http\Controllers;

use grubly\Purchase;
use grubly\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		$this->authorizeResource(Purchase::class);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('purchases.index');
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
		$user = Auth::user();
		$restaurant = Product::cartRestaurant();
		$products = Product::allInCart();
		Product::clearCart();

		$purchase = new Purchase();
		$purchase->user_id = $user->id;
		$purchase->restaurant_id = $restaurant->id;
		$purchase->total = $products->sum('price');
		$purchase->products = $products;
		$purchase->address = [
			'address' => $user->address,
			'suburb' => $user->suburb,
			'postcode' => $user->postcode,
			'state' => $user->state
		];
		$purchase->save();
		
		return redirect()->route('purchases.show', $purchase);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \grubly\Purchase  $purchase
	 * @return \Illuminate\Http\Response
	 */
	public function show(Purchase $purchase)
	{
		return view('purchases.show', ['purchase' => $purchase]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \grubly\Purchase  $purchase
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Purchase $purchase)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \grubly\Purchase  $purchase
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Purchase $purchase)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \grubly\Purchase  $purchase
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Purchase $purchase)
	{
		//
	}
}
