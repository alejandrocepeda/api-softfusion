<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		app()['cache']->forget('spatie.permission.cache');
		
		Role::create(['name' => 'superadmin']);
		Role::create(['name' => 'admin']);
		Role::create(['name' => 'processor']);
		Role::create(['name' => 'manager']);
		Role::create(['name' => 'broker']);
		Role::create(['name' => 'client']);
		Role::create(['name' => 'lender']);
	}
}
