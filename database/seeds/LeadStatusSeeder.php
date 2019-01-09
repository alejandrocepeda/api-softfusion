<?php

use App\LeadStatus;
use Illuminate\Database\Seeder;

class LeadStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        LeadStatus::create(['name' => 'new lead', 'status' => 1, 'step' => 1, 'level' => 'success']);
        LeadStatus::create(['name' => 'in progress', 'status' => 1, 'step' => 2, 'level' => 'success']);
        LeadStatus::create(['name' => 'no response', 'status' => 1, 'step' => 2, 'level' => 'warning']);
        LeadStatus::create(['name' => 'complete', 'status' => 1, 'step' => 3, 'level' => 'success']);
        LeadStatus::create(['name' => 'dead lead', 'status' => 1, 'step' => 3, 'level' => 'danger']);
    }
}
