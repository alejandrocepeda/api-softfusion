<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Approval;

class LenderApprovalTest extends TestCase
{
    /**
     * A basic test example.
     */
    protected $url   = 'api/v1/lenders/';
    protected $table = 'Approvals';

    /**
     * A basic test example.
     */
    public function test_list_lender()
    {
        $data     = factory(Approval::class)->create();
        $response = $this->get($this->url.$data->lender_id.'/approvals', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
