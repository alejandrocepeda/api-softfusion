<?php

use Illuminate\Database\Seeder;

class DynamicVarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(\App\DynamicVar::class, 100)->create();
    }
}
