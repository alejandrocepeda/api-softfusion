<?php

namespace Tests\Feature;

use App\ParametersForm;
use Tests\TestCase;

class ParametersFormCategoryParamentersFormTest extends TestCase
{
    protected $url   = 'api/v1/parameters-form-categories/';
    protected $table = 'parameters_forms';

    /**
     * A basic test example.
     */
    public function test_list_parameters_form_category_paramenters()
    {
        $data     = factory(ParametersForm::class)->create();
        $response = $this->get($this->url.$data->parameters_form_category_id.'/parameters', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
