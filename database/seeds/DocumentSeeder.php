<?php

use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(\App\Document::class, 100)->create()->each(function($staff){
			factory(\App\Application::class)->create()->documents()->save($staff);
		});
    }
}
