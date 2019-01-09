<?php

use Illuminate\Database\Seeder;

/**
 * Class YearInBusinessSeeder.
 */
class YearInBusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [['id' => '1', 'name' => '10+ years', 'order' => '1', 'value' => '120'],
             ['id' => '2', 'name' => '6+ years', 'order' => '2', 'value' => '72'],
             ['id' => '3', 'name' => '2+ years', 'order' => '5', 'value' => '24'],
             ['id' => '4', 'name' => '1-2+ years', 'order' => '6', 'value' => '12'],
             ['id' => '5', 'name' => '6-12 months', 'order' => '7', 'value' => '6'],
             ['id' => '6', 'name' => 'Under 6 months', 'order' => '8', 'value' => '3'],
             ['id' => '7', 'name' => 'Just starting up', 'order' => '9', 'value' => '0'],
             ['id' => '8', 'name' => 'Not Defined', 'order' => '10', 'value' => '0'],
             ['id' => '9', 'name' => '3+ Years', 'order' => '3', 'value' => '36'],
             ['id' => '10', 'name' => '2-3 Years', 'order' => '4', 'value' => '24'], ];

        DB::table('years_in_business')->delete();
        DB::table('years_in_business')->insert($data);
    }
}
