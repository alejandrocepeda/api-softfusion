<?php

use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(\App\Team::class, 10)->create()->each(function ($staff) {
	        $staff->users()->attach(\App\User::role('broker')->inRandomOrder()->take(10)->pluck('id'));
        });
        
    }
}
