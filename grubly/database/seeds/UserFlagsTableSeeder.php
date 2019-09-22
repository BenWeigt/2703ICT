<?php

use Illuminate\Database\Seeder;

class UserFlagsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('user_flags')->insert([
			'user_id' => '1',
			'flag' => 'test'
		]);
	}
}
