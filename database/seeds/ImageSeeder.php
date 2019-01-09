<?php

use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
		factory(\App\Image::class, 50)->create()->each(function($staff){
			factory(\App\User::class)->create()->image()->save($staff);
			//$staff->imagentable()->save(factory(\App\User::class)->create());
		});
		
		factory(\App\Image::class, 50)->create()->each(function($staff){
			factory(\App\Lender::class)->create()->image()->save($staff);
			//staff->imagentable()->save(factory(\App\Lender::class)->create());
		});
	}
}
