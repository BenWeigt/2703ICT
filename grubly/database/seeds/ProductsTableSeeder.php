<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 * 
	 * @return void
	 */
	public function run()
	{
		// name price restaurant_id
		// Sennheiser AKG HIFIMAN
		DB::table('products')->insert([
			'name' => 'HD 6XX Headphones',
			'price' => 220.00,
			'restaurant_id' => 1
		]);
		DB::table('products')->insert([
			'name' => 'HD 58X Jubilee Headphones',
			'price' => 160.00,
			'restaurant_id' => 1
		]);
		DB::table('products')->insert([
			'name' => 'PC37X Gaming Headphones',
			'price' => 120.00,
			'restaurant_id' => 1
		]);
		DB::table('products')->insert([
			'name' => 'K7XX Audiophile Headphones',
			'price' => 200.00,
			'restaurant_id' => 2
		]);
		DB::table('products')->insert([
			'name' => 'HE4XX Planar Headphones',
			'price' => 210.00,
			'restaurant_id' => 3
		]);
		DB::table('products')->insert([
			'name' => 'Edition XX Headphones',
			'price' => 600.00,
			'restaurant_id' => 3
		]);
	}
}
