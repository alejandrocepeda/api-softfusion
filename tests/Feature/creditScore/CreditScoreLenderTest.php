<?php

namespace Tests\Feature;

use App\Lender;
use Tests\TestCase;

class CreditScoreLenderTest extends TestCase
{
    protected $url   = 'api/v1/credit-scores/';
    protected $table = 'lenders';

    /**
     * A basic test example.
     */
    public function test_list_credit_score_lender()
    {
        $data     = factory(Lender::class)->create();
        $response = $this->get($this->url.$data->min_credit_score_id.'/lenders', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
