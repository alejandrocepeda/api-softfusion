<?php

namespace Tests\Feature;

use App\Industry;
use App\Lender;
use Tests\TestCase;

class LenderIndustryTest extends TestCase
{
    protected $url   = 'api/v1/lenders/';
    protected $table = 'lenders';

    public function test_lender_industry_list()
    {
        $lender   = factory(Lender::class)->create();
        $industry = factory(Industry::class)->create();
        $lender->industries()->attach($industry);
        $response = $this->get($this->url.$lender->id.'/industries', $this->headers());
        $response->assertStatus(200);
        $response->assertJson(['data' => [$industry->toarray()]]);
    }

    public function test_lender_industry_attach()
    {
        $lender   = factory(Lender::class)->create();
        $industry = factory(Industry::class)->create();
        $response = $this->put($this->url.$lender->id.'/industries/'.$industry->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($industry->toarray()), $industry->toarray());
        $response->assertJson(['data' => [$industry->toarray()]]);
    }

    public function test_lender_industry_dettach()
    {
        $lender   = factory(Lender::class)->create();
        $industry = factory(Industry::class)->create();
        $lender->industries()->attach($industry);
        $response = $this->delete($this->url.$lender->id.'/industries/'.$industry->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($industry->toarray()), $industry->toarray());
        $response->assertJsonMissing(['data' => [$industry->toarray()]]);
    }
}
