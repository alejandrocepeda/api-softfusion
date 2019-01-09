<?php

use Illuminate\Database\Seeder;

/**
 * Class ParametersFormCategorySeeder.
 */
class ParametersFormCategorySeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run()
	{
		$data = [['id' => 1, 'name' => 'property ownership'],
				 ['id' => 2, 'name' => 'amortization type'],
				 ['id' => 3, 'name' => 'mortgage type'],
				 ['id' => 4, 'name' => 'refinancing purpose'],
				 ['id' => 5, 'name' => 'loan property occupancy'],
				 ['id' => 6, 'name' => 'source of down payment'],
				 ['id' => 7, 'name' => 'income type'],
				 ['id' => 8, 'name' => 'account type'],
				 ['id' => 9, 'name' => 'property type loan'],
				 ['id' => 10, 'name' => 'equipment type'],];
		
		DB::table('parameters_form_categories')->insert($data);
	}
}
