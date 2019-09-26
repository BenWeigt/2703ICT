<?php

namespace grubly\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use grubly\Product;
use grubly\Restaurant;
use Validator;

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
		if (!empty($product))
		{
			Product::addToCart($product);
		}
		return view('components.cart');
	}

	public function removeFromCart(Request $request)
	{
		$product = Product::find($request->product_id);
		if (!empty($product))
		{
			Product::removeFromCart($product);
		}
		return view('components.cart');
	}

	public function clearCart()
	{
		Product::clearCart();
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
		return view('products.create');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Product $product
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request, Product $product)
	{
		return view('products.edit', ['product' => $product]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => [
				'required', 'string', 'max:255',
				Rule::unique('products')->where(function ($query) {
					return $query->where('restaurant_id', Auth::user()->id);
				})
			],
			'price' => ['required', 'numeric', 'min:0.05'],
			'image' => ['nullable', 'image']
		]);

		if ($validator->fails())
			return redirect()->route('products.create')->withErrors($validator)->withInput();

		$product = new Product();
		$product->name = $request->name;
		$product->price = $request->price;
		$product->restaurant_id = Auth::user()->id;
		$product->image = $request->image ? url(Storage::url($request->image->store('productimages', 'public'))) : null;
		$product->save();
		return view('products.show', ['product' => $product]);
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
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  Product $product
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Product $product)
	{
		$validator = Validator::make($request->all(), [
			'name' => ['required', 'string', 'max:255'],
			'price' => ['required', 'numeric', 'min:0.05'],
			'image' => ['nullable', 'image']
		]);
		if ($validator->fails())
			return redirect()->route('products.update', $product)->withErrors($validator)->withInput();

		$product->name = $request->name;
		$product->price = floor($request->price*100) / 100;
		$product->image = $request->image ? url(Storage::url($request->image->store('productimages', 'public'))) : $product->image;
		$product->save();
		return redirect()->route('products.show', $product);
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
