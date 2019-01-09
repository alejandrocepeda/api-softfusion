<?php

use Illuminate\Database\Seeder;

/**
 * Class loanPurposeSeeder.
 */
class loanPurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [['id' => '1', 'name' => 'Expansion'],
                 ['id' => '2', 'name' => 'Marketing/Advertising'],
                 ['id' => '3', 'name' => 'Purchasing Equipment'],
                 ['id' => '4', 'name' => 'Refinancing Debt'],
                 ['id' => '5', 'name' => 'Renovation and Repairs'],
                 ['id' => '6', 'name' => 'Working Capital'],
                 ['id' => '7', 'name' => 'Other'],
                 ['id' => '8', 'name' => 'Home Equity Line'],
                 ['id' => '9', 'name' => 'Construction'],
        ];

        DB::table('loan_purposes')->insert($data);
    }
}
