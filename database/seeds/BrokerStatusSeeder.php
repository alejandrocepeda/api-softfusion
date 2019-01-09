<?php

use Illuminate\Database\Seeder;

class BrokerStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\BrokerStatus::create(['name' => 'new broker', 'status' => 1, 'step' => 1, 'level' => 'success']);
        \App\BrokerStatus::create(['name' => 'package sent', 'status' => 1, 'step' => 2, 'level' => 'warning']);
        \App\BrokerStatus::create(['name' => 'approved', 'status' => 1, 'step' => 3, 'level' => 'success']);
        \App\BrokerStatus::create(['name' => 'declined', 'status' => 1, 'step' => 3, 'level' => 'danger']);
        
    
    }
}
