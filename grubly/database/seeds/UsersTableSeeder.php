<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->insert([
			'name' => 'Admin',
			'type' => 'administrator',
			'email' => 'admin@grubly.com',

			'address' => '170 Kessels Rd',
			'suburb' => 'Nathan',
			'postcode' => 4111,
			'state' => 'QLD',

			'password' => bcrypt('admin'),
		]);

		/**
		 * Restaurants
		 */
		DB::table('users')->insert([
			'name' => 'McDonalds',
			'email' => 'manager@mcdonalds.com',

			'address' => '664 Toohey Road',
			'suburb' => 'Salisbury',
			'postcode' => 4107,
			'state' => 'QLD',

			'type' => 'restaurant',
			'password' => bcrypt('123456'),
		]);
		DB::table('verifications')->insert([
			'restaurant_id' => 2
		]);

		DB::table('users')->insert([
			'name' => 'Sushi Train',
			'email' => 'manager@sushitrain.com',

			'address' => 'Shop 3, 1927 Beaudesert Rd.',
			'suburb' => 'Algester',
			'postcode' => 4116,
			'state' => 'QLD',

			'type' => 'restaurant',
			'password' => bcrypt('123456'),
		]);
		DB::table('verifications')->insert([
			'restaurant_id' => 3
		]);

		DB::table('users')->insert([
			'name' => 'Fresca Mex',
			'email' => 'manager@frescamex.com',

			'address' => '15 Denham Terrace',
			'suburb' => 'Tarragindi',
			'postcode' => 4121,
			'state' => 'QLD',

			'type' => 'restaurant',
			'password' => bcrypt('123456'),
		]);
		DB::table('verifications')->insert([
			'restaurant_id' => 4
		]);

		DB::table('users')->insert([
			'name' => 'Crust Pizza',
			'email' => 'manager@crustpizza.com',

			'address' => '1389 Logan Rd',
			'suburb' => 'Mount Gravatt',
			'postcode' => 4122,
			'state' => 'QLD',

			'type' => 'restaurant',
			'password' => bcrypt('123456'),
		]);
		DB::table('verifications')->insert([
			'restaurant_id' => 5
		]);

		DB::table('users')->insert([
			'name' => 'Schnitz',
			'email' => 'manager@schnitz.com',

			'address' => 'Logan Rd & Kessels Rd',
			'suburb' => 'Upper Mount Gravatt',
			'postcode' => 4122,
			'state' => 'QLD',

			'type' => 'restaurant',
			'password' => bcrypt('123456'),
		]);
		// DB::table('verifications')->insert([
		// 	'restaurant_id' => 6
		// ]);

		DB::table('users')->insert([
			'name' => 'Pizza Capers',
			'email' => 'manager@pizzacapers.com',

			'address' => '1722 Logan Road',
			'suburb' => 'Upper Mount Gravatt',
			'postcode' => 4122,
			'state' => 'QLD',

			'type' => 'restaurant',
			'password' => bcrypt('123456'),
		]);
		// DB::table('verifications')->insert([
		// 	'restaurant_id' => 7
		// ]);


		DB::table('users')->insert([
			'name' => 'Ned',
			'email' => 'ned@gmail.com',

			'address' => '123 Neds Rd',
			'suburb' => 'Nedland',
			'postcode' => 4000,
			'state' => 'QLD',

			'password' => bcrypt('123456'),
		]);
	}
}
