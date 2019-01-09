<?php

namespace Tests\Feature;

use App\SenderEmail;
use Tests\TestCase;

class SenderEmailTest extends TestCase
{
    protected $url   = 'api/v1/sender-emails/';
    protected $table = 'sender_emails';

    /**
     * A basic test example.
     */
    public function test_list_sender_email()
    {
        $data     = factory(SenderEmail::class)->create();
        $response = $this->get($this->url, $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_show_sender_email()
    {
        $data     = factory(SenderEmail::class)->create();
        $response = $this->get($this->url.$data->id, $this->headers());
        $response->assertStatus(200);
        $response->assertJson(['data'=>$data->toarray()]);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_create_sender_email()
    {
        $data     = factory(SenderEmail::class)->make();
        $response = $this->post($this->url, $data->toarray(), $this->headers());
        $response->assertStatus(201);
        $response->assertJsonFragment($data->toarray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_update_sender_email()
    {
        $old      = factory(SenderEmail::class)->create();
        $data     = factory(SenderEmail::class)->make();
        $response = $this->put($this->url.$old->id, $data->toarray(), $this->headers());
        $response->assertStatus(200);
        $response->assertJsonFragment($data->toarray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
        $this->assertDatabaseMissing($this->table, $old->toarray());
    }

    public function test_delete_sender_email()
    {
        $data     = factory(SenderEmail::class)->create();
        $response = $this->delete($this->url.$data->id, [], $this->headers());
        $response->assertStatus(200);
        $tratamiento = $data->toarray();
        unset($tratamiento['updated_at']);
        $response->assertJson(['data' => $tratamiento]);
        $response->assertJsonStructure(array_keys($tratamiento), $tratamiento);
        $this->assertSoftDeleted($this->table, $tratamiento);
    }
}
