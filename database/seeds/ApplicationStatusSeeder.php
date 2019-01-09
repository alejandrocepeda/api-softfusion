<?php

use App\ApplicationStatus;
use Illuminate\Database\Seeder;

class ApplicationStatusSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run()
	{
		ApplicationStatus::create(['name' => 'new application', 'status' => 1, 'step' => 1, 'level' => 'success']);
		ApplicationStatus::create(['name'   => 'documentation complete',
								   'status' => 1,
								   'step'   => 2,
								   'level'  => 'success']);
		ApplicationStatus::create(['name'   => 'documentation pending',
								   'status' => 1,
								   'step'   => 2,
								   'level'  => 'warning']);
		ApplicationStatus::create(['name' => 'lender approved', 'status' => 1, 'step' => 3, 'level' => 'success']);
		ApplicationStatus::create(['name' => 'contract sent', 'status' => 1, 'step' => 3, 'level' => 'warning']);
		ApplicationStatus::create(['name' => 'contract signed', 'status' => 1, 'step' => 3, 'level' => 'success']);
		ApplicationStatus::create(['name' => 'approved', 'status' => 1, 'step' => 4, 'level' => 'success']);
		ApplicationStatus::create(['name' => 'declined', 'status' => 1, 'step' => 4, 'level' => 'danger']);
	}
}
