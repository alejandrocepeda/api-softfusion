<?php

use Illuminate\Database\Seeder;

class ActivitiesStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\ActivitiesStatus::create(['name'=>'To Do']);
        \App\ActivitiesStatus::create(['name'=>'Doing']);
        \App\ActivitiesStatus::create(['name'=>'Done']);
    }
}
