<?php

namespace Tests\Feature;

use App\Lender;
use App\ParametersForm;
use Tests\TestCase;

class LenderParametersFormTest extends TestCase
{
    protected $url   = 'api/v1/lenders/';
    protected $table = 'lenders';

    public function test_lender_property_type_list()
    {
        $lender        = factory(Lender::class)->create();
        $property_type = factory(ParametersForm::class)->create();
        $lender->property_types()->attach($property_type);
        $response = $this->get($this->url.$lender->id.'/property-types', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($property_type->toarray()), $property_type->toarray());
        $response->assertJson(['data' => [$property_type->toarray()]]);
    }

    public function test_lender_property_type_attach()
    {
        $lender        = factory(Lender::class)->create();
        $property_type = factory(ParametersForm::class)->create();
        $response      = $this->put($this->url.$lender->id.'/property-types/'.$property_type->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($property_type->toarray()), $property_type->toarray());
        $response->assertJson(['data' => [$property_type->toarray()]]);
    }

    public function test_lender_property_type_dettach()
    {
        $lender        = factory(Lender::class)->create();
        $property_type = factory(ParametersForm::class)->create();
        $lender->property_types()->attach($property_type);
        $response = $this->delete($this->url.$lender->id.'/property-types/'.$property_type->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($property_type->toarray()), $property_type->toarray());
        $response->assertJsonMissing(['data' => [$property_type->toarray()]]);
    }
}
