<?php

use App\Contact;
use App\User;
use Illuminate\Database\Seeder;

/**
 * Class UsersTableSeeder.
 */
class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run()
	{
		$contact = Contact::create(['name'  => 'Mauricio Suarez vega',
		                            'email' => 'msuarez@gokapital.com']);
		
		$user_super_admin1 = User::create(['name'       => 'Mauricio Suarez vega',
		                                   'email'      => 'msuarez@gokapital.com',
		                                   'password'   => 'gokapital',
		                                   'contact_id' => $contact->id]);
		
		$contact = Contact::create(['name'  => 'Douglas Moreno',
		                            'email' => 'douglaszzm@gmail.com']);
		
		$user_super_admin2 = User::create(['name'       => 'Douglas Moreno',
		                                   'email'      => 'douglaszzm@gmail.com',
		                                   'password'   => 'gokapital',
		                                   'contact_id' => $contact->id]);
		
		$contact = Contact::create(['name'  => 'Oliver Moreno',
		                            'email' => 'oliverm@gmail.com']);
		
		$user_super_admin3 = User::create(['name'       => 'Oliver Moreno',
		                                   'email'      => 'oliverm@gmail.com',
		                                   'password'   => 'gokapital',
		                                   'contact_id' => $contact->id]);
		
		$contact = Contact::create(['name'  => 'Chris Moreno',
		                            'email' => 'chris@gokapital.com']);
		
		$user_super_admin4 = User::create(['name'       => 'Chris Moreno',
		                                   'email'      => 'chris@gokapital.com',
		                                   'password'   => 'gokapital',
		                                   'contact_id' => $contact->id]);
		
		$user_super_admin1->syncRoles('superadmin');
		$user_super_admin2->syncRoles('superadmin');
		$user_super_admin3->syncRoles('superadmin');
		$user_super_admin4->syncRoles('superadmin');
		
		$user_admin = factory(User::class)->create();
		
		$user_admin->contact()->create(collect($user_admin)
			->except(['id', 'contact_id', 'roles', 'contact'])
			->toarray());
		
		$user_admin->syncRoles('admin');
		
		$user_processor = factory(User::class)->create();
		
		$user_processor->contact()->create(collect($user_processor)->except(['id', 'contact_id', 'roles', 'contact'])->toarray());
		
		$user_processor->syncRoles('processor');
		
		$user_manager = factory(User::class)->create();
		
		$user_manager->contact()->create(collect($user_manager)->except(['id', 'contact_id', 'roles', 'contact'])->toarray());
		
		$user_manager->syncRoles('manager');
		
		$user_broker = factory(User::class)->create();
		
		$user_broker->contact()->create(collect($user_broker)->except(['id', 'contact_id', 'roles', 'contact'])->toarray());
		
		$user_broker->syncRoles('broker');
		$user_lender = factory(User::class)->create();
		$user_lender->contact()->create(collect($user_lender)->except(['id', 'contact_id', 'roles', 'contact'])->toarray());
		$user_lender->syncRoles('lender');
		$user_client = factory(User::class)->create();
		$user_client->contact()->create(collect($user_client)->except(['id', 'contact_id', 'roles', 'contact'])->toarray());
		$user_client->syncRoles('client');
		factory(User::class, 100)->create()->each(function ($user) {
			$user->contact()->create(collect($user)->except(['id', 'contact_id', 'roles', 'contact'])->toarray());
			$user->syncRoles(\Spatie\Permission\Models\Role::inRandomOrder()->first()->id);
		});
		
	}
}
