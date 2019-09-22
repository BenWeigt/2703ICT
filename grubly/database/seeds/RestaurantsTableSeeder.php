<?php

use Illuminate\Database\Seeder;

class RestaurantsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('restaurants')->insert([
			'name' => 'Sushi Station',
			'user_id' => 2,
			'verified' => true
		]);
		DB::table('restaurants')->insert([
			'name' => 'Crust Pizza',
			'user_id' => 3
		]);
		DB::table('restaurants')->insert([
			'name' => 'The Foodary',
			'user_id' => 4
		]);	
	}
}
