<?php

use Illuminate\Database\Seeder;

class SenderEmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(\App\SenderEmail::class, 10)->create();
    }
}
