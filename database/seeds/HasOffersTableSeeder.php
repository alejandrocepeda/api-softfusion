<?php

use Illuminate\Database\Seeder;

/**
 * Class HasOffersTableSeeder
 */
class HasOffersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		factory(\App\HasOffers::class, 100)->create();
	}
	
}
