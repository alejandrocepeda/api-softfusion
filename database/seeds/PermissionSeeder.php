<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$all   = Permission::create(['name' => 'all']);
		
		$all->assignRole(['superadmin', 'admin', 'processor']);
		
		
		$group = Permission::create(['name' => 'group']);
		
		$group->assignRole(['manager']);
		
		
		$self  = Permission::create(['name' => 'self']);
		
		$self->assignRole(['client', 'lender', 'broker']);
	}
}
