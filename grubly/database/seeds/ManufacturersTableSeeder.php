<?php

use Illuminate\Database\Seeder;

class ManufacturersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// name
		DB::table('manufacturers')->insert([
			'name' => 'Sennheiser'
		]);
		DB::table('manufacturers')->insert([
			'name' => 'AKG'
		]);
		DB::table('manufacturers')->insert([
			'name' => 'HIFIMAN'
		]);		
	}
}
