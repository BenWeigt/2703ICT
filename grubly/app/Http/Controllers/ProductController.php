<?php

namespace grubly\Http\Controllers;

use Illuminate\Http\Request;
use grubly\Product;
use grubly\Manufacturer;

class ProductController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth', ['except'=>['index','show']]);
	}
		
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$products = Product::all();
		return view('products.index', ['products' => $products]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('products.create', ['manufacturers' => Manufacturer::all()]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|max:255',
			'price' => 'required|numeric|min:1',
			'manufacturer' => 'exists:manufacturers,id'
		]);
		$product = new Product();
		$product->name = $request->name;
		$product->price = $request->price;
		$product->manufacturer_id = $request->manufacturer;
		$product->save();
		return redirect('product/'.$product->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$product = Product::find($id);
		return view('products.show', ['product' => $product]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$product = Product::find($id);
		return view('products.edit', ['product' => $product, 'manufacturers' => Manufacturer::all()]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'name' => 'required|max:255',
			'price' => 'required|numeric|min:1',
			'manufacturer' => 'exists:manufacturers,id'
		]);
		$product = Product::find($id);
		$product->name = $request->name;
		$product->price = $request->price;
		$product->manufacturer_id = $request->manufacturer;
		$product->save();
		return redirect('product/'.$product->id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$product = Product::find($id);
		$product->delete();
		return redirect('product');
	}
}
