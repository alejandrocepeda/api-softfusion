<?php

use Illuminate\Database\Seeder;

class ReadItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		factory(\App\ReadItem::class, 10)->create()->each(function($staff){
			factory(\App\Lead::class)->create()->read()->save($staff);
			//$staff->readtable()->save(factory(\App\Lead::class)->create());
		});
	
		factory(\App\ReadItem::class, 10)->create()->each(function($staff){
			factory(\App\Application::class)->create()->read()->save($staff);
			//$staff->readtable()->save(factory(\App\Application::class)->create());
		});
	
		factory(\App\ReadItem::class, 10)->create()->each(function($staff){
			factory(\App\User::class)->create()->read()->save($staff);
			//$staff->readtable()->save(factory(\App\User::class)->create());
		});

    }
    
}
