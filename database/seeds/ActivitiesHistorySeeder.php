<?php

use Illuminate\Database\Seeder;

class ActivitiesHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(\App\ActivitiesHistory::class, 100)->create();
    }
}
