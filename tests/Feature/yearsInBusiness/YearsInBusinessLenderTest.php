<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Lender;

class YearsInBusinessLenderTest extends TestCase
{
    protected $url   = 'api/v1/years-in-business/';
    protected $table = 'lenders';

    /**
     * A basic test example.
     */
    public function test_list_contact_user()
    {
        $data     = factory(Lender::class)->create();
        $response = $this->get($this->url.$data->years_in_business_id.'/lenders', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
