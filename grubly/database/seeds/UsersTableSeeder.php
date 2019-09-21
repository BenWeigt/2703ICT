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
			'name' => "Bob",
			'email' => 'Bob@gmail.com',
			'password' => bcrypt('123456'),
		]);
		DB::table('users')->insert([
			'name' => "Fred",
			'email' => 'Fred@gmail.com',
			'password' => bcrypt('123456'),
		]);
		DB::table('users')->insert([
			'name' => "Foo",
			'email' => 'Foo@gmail.com',
			'password' => bcrypt('123456'),
		]);
		DB::table('users')->insert([
			'name' => "Bar",
			'email' => 'Bar@gmail.com',
			'password' => bcrypt('123456'),
		]);
	}
}
