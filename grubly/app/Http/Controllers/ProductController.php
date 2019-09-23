<?php

namespace grubly\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use grubly\Product;
use grubly\Restaurant;

class ProductController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth', ['except'=>['index','show']]);
		$this->authorizeResource(Product::class);
	}

	public function addToCart(Request $request)
	{
		$product = Product::find($request->product_id);
		if (!empty($product) && !empty(Auth::user()) && Auth::user()->can('addToCart', $product))
		{
			// Get or initialse cart
			$cart = session('cart');
			if (empty($cart))
			{
				$cart = [
					'restaurant_id' => $product->restaurant->id,
					'products' => []
				];
			}
			// Cart must be all from the same restaurant
			if ($cart['restaurant_id'] === $product->restaurant->id)
			{
				// Add to cart
				$cart['products'][$product->id] = isset($cart['products'][$product->id]) ? $cart['products'][$product->id] + 1 : 1;
				session(['cart' => $cart]);
			}
		}
		return view('components.cart');
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
		return view('products.create', ['restaurants' => Restaurant::all()]);
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
			'restaurant' => 'exists:restaurants,id'
		]);
		$product = new Product();
		$product->name = $request->name;
		$product->price = $request->price;
		$product->restaurant_id = $request->restaurant;
		$product->save();
		return redirect('product/'.$product->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Product $product
	 * @return \Illuminate\Http\Response
	 */
	public function show(Product $product)
	{
		return view('products.show', ['product' => $product]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Product $product
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Product $product)
	{
		return view('products.edit', ['product' => $product, 'restaurants' => Restaurant::all()]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  Product $product
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Product $product)
	{
		$this->validate($request, [
			'name' => 'required|max:255',
			'price' => 'required|numeric|min:1',
			'restaurant' => 'exists:restaurants,id'
		]);
		$product->name = $request->name;
		$product->price = $request->price;
		$product->restaurant_id = $request->restaurant;
		$product->save();
		return redirect('product/'.$product->id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Product $product
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Product $product)
	{
		$product->delete();
		return redirect('product');
	}
}
