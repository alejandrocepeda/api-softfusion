<?php

namespace Tests\Feature\application;

use App\Application;
use App\Contact;
use Tests\TestCase;

class ApplicationCoborrowerTest extends TestCase
{
    /**
     * A basic test example.
     */
    protected $url   = 'api/v1/applications/';
    protected $table = 'contacts';

    /**
     * A basic test example.
     */
    public function test_list_coborrower_application()
    {
        $data       = factory(Application::class)->create();
        $coborrower = Contact::findOrFail($data->coborrower_id);
        $response   = $this->get($this->url.$data->id.'/coborrowers', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($coborrower->toarray()), $coborrower->toarray());
        $this->assertDatabaseHas($this->table, $coborrower->toarray());
    }
}
