<?php

use Illuminate\Database\Seeder;

/**
 * Class productSeeder.
 */
class productSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run()
	{
		$data = [['name' => 'Business Loans', 'status' => true],
				 ['name' => 'Lines of credit', 'status' => true],
				 ['name' => 'Conventional Mortgage', 'status' => true],
				 ['name' => 'Equipment Financing', 'status' => true],
				 ['name' => 'Commercial Financing', 'status' => false],
				 ['name' => 'Cash advance / Revene based loan', 'status' => false],
				 ['name' => 'Real state', 'status' => false],
				 ['name' => 'Factoring', 'status' => false],
				 ['name' => 'Personal loan', 'status' => false],];
		
		DB::table('products')->insert($data);
	}
}
