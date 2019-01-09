<?php

use Illuminate\Database\Seeder;

/**
 * Class CreditScoreSeeder.
 */
class CreditScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [['name' => 'Excellent (700+)', 'value' => '700'],
                 ['name' => 'Good (650-700)', 'value' => '650'],
                 ['name' => 'Fair (600-650)', 'value' => '600'],
                 ['name' => 'Poor (< 600)', 'value' => '0'],
                 ['name' => 'Not Sure', 'value' => '0'], ];

        DB::table('credit_scores')->insert($data);
    }
}
