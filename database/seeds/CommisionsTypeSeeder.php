<?php

use Illuminate\Database\Seeder;

class CommisionsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(\App\CommisionsType::class, 100)->create();
    }
}
