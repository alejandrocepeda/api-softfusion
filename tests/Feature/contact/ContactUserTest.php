<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class ContactUserTest extends TestCase
{
    protected $url   = 'api/v1/contacts/';
    protected $table = 'users';

    /**
     * A basic test example.
     */
    public function test_list_contact_user()
    {
        $data     = factory(User::class)->create();
        $response = $this->get($this->url.$data->contact_id.'/users', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
