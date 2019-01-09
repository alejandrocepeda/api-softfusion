<?php

namespace Tests\Feature;

use App\Lender;
use App\State;
use Tests\TestCase;

class StateLenderTest extends TestCase
{
    protected $url   = 'api/v1/states/';
    protected $table = 'lender_state';

    /**
     * A basic test example.
     */
    public function test_list_state_lender()
    {
        $lender = factory(Lender::class)->create();
        $state  = factory(State::class)->create();
        $lender->states()->attach($state->id);
        $response = $this->get($this->url.$state->id.'/lenders', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($lender->toarray()), $lender->toarray());
        $this->assertDatabaseHas($this->table, ['lender_id' => $lender->id, 'state_id' => $state->id]);
    }

    public function test_update_state_lender()
    {
        $lender   = factory(Lender::class)->create();
        $state    = factory(State::class)->create();
        $response = $this->put($this->url.$state->id.'/lenders/'.$lender->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($lender->toarray()), $lender->toarray());
        $this->assertDatabaseHas($this->table, ['lender_id' => $lender->id, 'state_id' => $state->id]);
    }

    public function test_delete_state_lender()
    {
        $lender = factory(Lender::class)->create();
        $state  = factory(State::class)->create();
        $lender->states()->attach($state->id);
        $this->assertDatabaseHas($this->table, ['lender_id' => $lender->id, 'state_id' => $state->id]);
        $response = $this->delete($this->url.$state->id.'/lenders/'.$lender->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($lender->toarray()), $lender->toarray());
        $this->assertDatabaseMissing($this->table, ['lender_id' => $lender->id, 'state_id' => $state->id]);
    }
}
