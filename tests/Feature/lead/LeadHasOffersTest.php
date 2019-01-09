<?php

namespace Tests\Feature;

use App\HasOffers;
use Tests\TestCase;

class LeadHasOffersTest extends TestCase
{
    /**
     * A basic test example.
     */
    protected $url   = 'api/v1/leads/';
    protected $table = 'has_offers';

    /**
     * A basic test example.
     */
    public function test_list_applications_has_offers()
    {
        $data     = factory(HasOffers::class)->create();
        $response = $this->get($this->url.$data->lead_id.'/has-offers', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}