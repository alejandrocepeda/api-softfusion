<?php

namespace Tests\Feature;

use App\Http\Resources\LeadResource;
use App\Lead;
use Tests\TestCase;

class LeadTest extends TestCase
{
    protected $url   = 'api/v1/leads/';
    protected $table = 'leads';

    /**
     * A basic test example.
     */
    public function test_list_lead()
    {
        $data     = factory(Lead::class)->create();
        $response = $this->get($this->url, $this->headers()); //->dump() see uot the code for error
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_show_lead()
    {
        $data     = factory(Lead::class)->create();
        $response = $this->get($this->url.$data->id, $this->headers());
        $data     = collect(new LeadResource($data));
        $response->assertStatus(200);
        $response->assertJsonFragment($data->toarray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
    }

    public function test_create_lead()
    {
        $data     = collect(factory(Lead::class)->make());
        $response = $this->post($this->url, $data->toarray(), $this->headers());
        $this->assertDatabaseHas($this->table, $data->toarray());
        $response->assertStatus(201);
        $response->assertJsonFragment($data->except(['contact_id', 'executive_id', 'lead_status_id'])->toArray());
    }

    public function test_update_lead()
    {
        $old      = factory(Lead::class)->create();
        $data     = collect(factory(Lead::class)->make());
        $response = $this->put($this->url.$old->id, $data->toarray(), $this->headers());
        $this->assertDatabaseMissing($this->table, $old->toarray());
        $this->assertDatabaseHas($this->table, $data->except('updated_at')->toarray());
        $response->assertStatus(200);
        $response->assertJsonFragment($data->except(['contact_id', 'executive_id', 'lead_status_id'])->toArray());
    }

    public function test_update_empty()
    {
        $data     = factory(Lead::class)->create();
        $response = $this->put($this->url.$data->id, [], $this->headers());
        $response->assertStatus(422);
    }

    public function test_delete_lead()
    {
        $data     = factory(Lead::class)->create();
        $response = $this->delete($this->url.$data->id, [], $this->headers());
        $this->assertSoftDeleted($this->table, $data->toArray());
        $response->assertStatus(200);
        $data = collect(new LeadResource($data));
        $response->assertJsonFragment($data->toArray());
        $response->assertJsonStructure(array_keys($data->toArray()), $data->toArray());
    }
}
