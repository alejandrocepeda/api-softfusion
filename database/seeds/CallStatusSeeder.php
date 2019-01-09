<?php

use Illuminate\Database\Seeder;

class CallStatusSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		\App\CallStatus::create(['name' => 'Unanswered']);
		\App\CallStatus::create(['name' => 'Busy']);
		\App\CallStatus::create(['name' => 'Wrong Number']);
		\App\CallStatus::create(['name' => 'Leave Live Message']);
		\App\CallStatus::create(['name' => 'Leave Voice Mail']);
		\App\CallStatus::create(['name' => 'Online']);
	}
}
