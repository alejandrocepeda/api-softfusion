<?php

use Illuminate\Database\Seeder;

/**
 * Class countrySeeder.
 */
class countrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [['name' => 'United States', 'id' => 1],
             ['name' => 'Canada', 'id' => 3], ];

        DB::table('countries')->insert($data);
    }
}
