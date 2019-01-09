<?php

namespace Tests\Feature;

use App\HasOfferStatus;
use Tests\TestCase;

class HasOfferStatusTest extends TestCase
{
    protected $url   = 'api/v1/has-offer-statuses/';
    protected $table = 'has_offer_statuses';

    /**
     * A basic test example.
     */
    public function test_list_HasOfferStatus()
    {
        $data     = factory(HasOfferStatus::class)->create();
        $response = $this->get($this->url, $this->headers()); //->dump() see uot the code for error
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_show_HasOfferStatus()
    {
        $data     = factory(HasOfferStatus::class)->create();
        $response = $this->get($this->url.$data->id, $this->headers());
        $response->assertStatus(200);
        $response->assertJson(['data' => $data->toarray()]);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_create_HasOfferStatus()
    {
        $data     = factory(HasOfferStatus::class)->make();
        $response = $this->post($this->url, $data->toarray(), $this->headers());
        $response->assertStatus(201);
        $response->assertJsonFragment($data->toarray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_update_HasOfferStatus()
    {
        $old      = factory(HasOfferStatus::class)->create();
        $data     = factory(HasOfferStatus::class)->make();
        $response = $this->put($this->url.$old->id, $data->toarray(), $this->headers());
        $response->assertStatus(200);
        $response->assertJsonFragment($data->toarray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
        $this->assertDatabaseMissing($this->table, $old->toarray());
    }

    public function test_delete_HasOfferStatus()
    {
        $data     = factory(HasOfferStatus::class)->create();
        $response = $this->delete($this->url.$data->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJson(['data' => collect($data)->except(['updated_at'])->toArray()]);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertSoftDeleted($this->table, collect($data)->except(['updated_at'])->toArray());
    }
}
