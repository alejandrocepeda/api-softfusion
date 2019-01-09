<?php

use Illuminate\Database\Seeder;

class ActivitiesTypeSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run()
	{
		\App\ActivitiesType::create(['name' => 'Note']);
		\App\ActivitiesType::create(['name' => 'Task']);
		\App\ActivitiesType::create(['name' => 'Email']);
		\App\ActivitiesType::create(['name' => 'Call']);
		\App\ActivitiesType::create(['name' => 'Meeting']);
	}
}
