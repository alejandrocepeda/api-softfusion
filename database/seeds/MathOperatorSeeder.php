<?php

use Illuminate\Database\Seeder;

class MathOperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(\App\MathOperator::class, 100)->create();
    }
}
