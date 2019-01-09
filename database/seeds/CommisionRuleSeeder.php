<?php

use Illuminate\Database\Seeder;

class CommisionRuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(\App\CommisionRule::class, 100)->create();
    }
}
