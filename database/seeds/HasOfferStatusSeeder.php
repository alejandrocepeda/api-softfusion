<?php

use Illuminate\Database\Seeder;

class HasOfferStatusSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run()
	{
		\App\HasOfferStatus::create(['name' => 'Page View', 'status' => 1, 'level' => 'warning']);
		\App\HasOfferStatus::create(['name' => 'Lead', 'status' => 1, 'level' => 'success']);
		\App\HasOfferStatus::create(['name' => 'Deal', 'status' => 1, 'level' => 'success']);
	}
}
