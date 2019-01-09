<?php

use App\Periodicity;
use Illuminate\Database\Seeder;

class PeriodiCitySeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Periodicity::create(['name' => 'Unique', 'value' => 0]);
		Periodicity::create(['name' => 'Daily', 'value' => 1]);
		Periodicity::create(['name' => 'Weekly', 'value' => 7]);
		Periodicity::create(['name' => 'Monthly', 'value' => 30]);
		Periodicity::create(['name' => 'Quarterly', 'value' => 91]);
		Periodicity::create(['name' => 'Annualy', 'value' => 365]);
	}
}
