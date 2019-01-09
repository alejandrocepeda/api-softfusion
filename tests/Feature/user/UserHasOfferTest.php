<?php

namespace Tests\Feature\user;

use Tests\TestCase;
use App\HasOffers;

class UserHasOfferTest extends TestCase
{
    protected $url   = 'api/v1/users/';
    protected $table = 'has_offers';

    /**
     * A basic test example.
     */
    public function test_list_user_has_offer()
    {
        $data     = factory(HasOffers::class)->create();
        $response = $this->get($this->url.$data->broker_id.'/has-offers', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
