<?php

namespace Tests\Feature;

use App\Business;
use Tests\TestCase;

class HowDoYouHearBusinessTest extends TestCase
{
    /**
     * A basic test example.
     */
    protected $url   = 'api/v1/how-do-you-hears/';
    protected $table = 'businesses';

    /**
     * A basic test example.
     */
    public function test_list_how_do_you_hears_business()
    {
        $data     = factory(Business::class)->create();
        $response = $this->get($this->url.$data->how_do_you_hear_id.'/businesses', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
