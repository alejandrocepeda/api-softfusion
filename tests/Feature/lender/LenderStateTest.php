<?php

namespace Tests\Feature;

use App\Lender;
use App\State;
use Tests\TestCase;

class LenderStateTest extends TestCase
{
    protected $url   = 'api/v1/lenders/';
    protected $table = 'lenders';

    public function test_lender_state_list()
    {
        $lender = factory(Lender::class)->create();
        $state  = State::all()->random(5);
        $lender->states()->attach($state);
        $response = $this->get($this->url.$lender->id.'/states', $this->headers());
        $response->assertStatus(200);
        $response->assertJson(['data' => $state->toarray()]);
    }

    public function test_lender_state_attach()
    {
        $lender   = factory(Lender::class)->create();
        $state    = State::all()->random()->first();
        $response = $this->put($this->url.$lender->id.'/states/'.$state->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($state->toarray()), $state->toarray());
        $response->assertJson(['data' => [$state->toarray()]]);
    }

    public function test_lender_state_dettach()
    {
        $lender = factory(Lender::class)->create();
        $state  = State::all()->random()->first();
        $lender->states()->attach($state);
        $response = $this->delete($this->url.$lender->id.'/states/'.$state->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($state->toarray()), $state->toarray());
        $response->assertJsonMissing(['data' => [$state->toarray()]]);
    }
}
