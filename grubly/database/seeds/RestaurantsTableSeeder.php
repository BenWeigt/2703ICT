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
		// name
		DB::table('restaurants')->insert([
			'name' => 'Sennheiser'
		]);
		DB::table('restaurants')->insert([
			'name' => 'AKG'
		]);
		DB::table('restaurants')->insert([
			'name' => 'HIFIMAN'
		]);		
	}
}
