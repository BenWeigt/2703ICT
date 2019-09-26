<?php

namespace grubly\Http\Controllers;

use grubly\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$this->middleware('auth');
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
	 * @param  \grubly\Purchase  $purchase
	 * @return \Illuminate\Http\Response
	 */
	public function show(Purchase $purchase)
	{
		//
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
