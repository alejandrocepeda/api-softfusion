<?php

namespace Tests\Feature;

use App\Lender;
use Tests\TestCase;

class AnnualRevenueLenderTest extends TestCase
{
    protected $url   = 'api/v1/annual-revenues/';
    protected $table = 'lenders';

    /**
     * A basic test example.
     */
    public function test_list_annual_revenue_lender()
    {
        $data     = factory(Lender::class)->create();
        $response = $this->get($this->url.$data->annual_revenue_id.'/lenders', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
