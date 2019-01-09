<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

class TraitUserTest extends TestCase
{
    protected $url   = 'api/v1/users/';
    protected $table = 'users';

    /**
     * A basic test example.
     */
    public function test_list_user()
    {
        $data     = factory(User::class)->create();
        $response = $this->get($this->url, $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
