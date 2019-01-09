<?php

use Illuminate\Database\Seeder;

class BrokerInfoSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run()
	{
		\App\User::role('broker')->inRandomOrder()->take(10)->each(function ($item) {
			$item->broker()->save(factory(\App\BrokerInfo::class)->create());
		});
		
		\App\Team::all()->each(function ($item) {
			$item->brokerInfo()->save(factory(\App\BrokerInfo::class)->create());
		});
		
	}
}
