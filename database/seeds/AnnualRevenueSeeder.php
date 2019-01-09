<?php

use Illuminate\Database\Seeder;

/**
 * Class AnnualRevenueSeeder.
 */
class AnnualRevenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [['value' => 500000, 'name' => 'Up to $500,000'],
             ['value' => 1000000, 'name' => '$500,000 - $1,000,000'],
             ['value' => 5000000, 'name' => '$1,000,000 - $5,000,000'],
             ['value' => 10000000, 'name' => '$5,000,000 - $10,000,000'],
             ['value' => 20000000, 'name' => '$10,000,000 - $20,000,000'],
             ['value' => 50000000, 'name' => '$20,000,000 - $50,000,000'],
             ['value' => 51000000, 'name' => '$50,000,000+'], ];

        DB::table('annual_revenues')->insert($data);
    }
}
