<?php

use Illuminate\Database\Seeder;

class EmailSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		factory(\App\Email::class, 50)->create()->each(function($staff){
			\App\SenderEmail::inRandomOrder()->first()->emails()->save($staff);
		});
		
		factory(\App\Email::class, 50)->create()->each(function($staff){
			\App\User::inRandomOrder()->first()->emails()->save($staff);
		});
		
	}
}
