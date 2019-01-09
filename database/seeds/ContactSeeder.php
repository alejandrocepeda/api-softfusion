<?php

use App\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Contact::flushEventListeners();

        //factory(Contact::class, 100)->create();
    }
}
