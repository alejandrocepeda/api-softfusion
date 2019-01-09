<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Image;

class TraitImageTest extends TestCase
{
    protected $url   = 'api/v1/images/';
    protected $table = 'images';

    /**
     * A basic test example.
     */
    public function test_list_image()
    {
        $data     = factory(Image::class)->create();
        $response = $this->get($this->url, $this->headers()); //->dump() see uot the code for error
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
