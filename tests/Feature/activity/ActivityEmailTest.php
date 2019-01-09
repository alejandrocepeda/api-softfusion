<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Email;

class ActivityEmailTest extends TestCase
{
    /**
     * A basic test example.
     */
    protected $url   = 'api/v1/activities/';
    protected $table = 'emails';

    /**
     * A basic test example.
     */
    public function test_list_activities_email()
    {
        $data     = factory(Email::class)->create();
        $response = $this->get($this->url.$data->activity_id.'/emails', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
