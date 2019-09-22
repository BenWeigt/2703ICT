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

		DB::table('users')->insert([
			'name' => 'Bob',
			'email' => 'bob@sushistation.com',

			'address' => '170 Bobs Rd',
			'suburb' => 'Nathan',
			'postcode' => 4111,
			'state' => 'QLD',

			'type' => 'manager',
			'password' => bcrypt('123456'),
		]);
		DB::table('users')->insert([
			'name' => 'Fred',
			'email' => 'fred@crustpizza.com',

			'address' => '170 Freds Rd',
			'suburb' => 'Nathan',
			'postcode' => 4111,
			'state' => 'QLD',

			'type' => 'manager',
			'password' => bcrypt('123456'),
		]);
		DB::table('users')->insert([
			'name' => 'Ned',
			'email' => 'ned@thefoodary.com',

			'address' => '173 Neds Rd',
			'suburb' => 'Nathan',
			'postcode' => 4111,
			'state' => 'QLD',

			'type' => 'manager',
			'password' => bcrypt('123456'),
		]);
		DB::table('users')->insert([
			'name' => 'Foo',
			'email' => 'foo@gmail.com',

			'address' => '174 Foos Rd',
			'suburb' => 'Nathan',
			'postcode' => 4111,
			'state' => 'QLD',

			'password' => bcrypt('123456'),
		]);
		DB::table('users')->insert([
			'name' => 'Bar',
			'email' => 'bar@gmail.com',

			'address' => '174 Bars Rd',
			'suburb' => 'Nathan',
			'postcode' => 4111,
			'state' => 'QLD',

			'password' => bcrypt('123456'),
		]);
		DB::table('users')->insert([
			'name' => 'Baz',
			'email' => 'baz@gmail.com',

			'address' => '174 Bazs Rd',
			'suburb' => 'Nathan',
			'postcode' => 4111,
			'state' => 'QLD',

			'password' => bcrypt('123456'),
		]);
	}
}
