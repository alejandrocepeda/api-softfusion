<?php

namespace Tests\Feature;

use App\Image;
use Tests\TestCase;

class ImageTest extends TestCase
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

    public function test_show_image()
    {
        $data     = factory(Image::class)->create();
        $response = $this->get($this->url.$data->id, $this->headers());
        $response->assertStatus(200);
        $response->assertJson(['data' => $data->toarray()]);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    /*public function test_create_image()
    {
        $data     = factory(Image::class)->make();
        $response = $this->post($this->url, $data->toarray(), $this->headers());
        $response->assertStatus(201);
        $response->assertJsonFragment($data->toarray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }*/

    public function test_update_image()
    {
        $old      = factory(Image::class)->create();
        $data     = factory(Image::class)->make();
        $response = $this->put($this->url.$old->id, $data->toarray(), $this->headers());
        $response->assertStatus(200);
        $response->assertJsonFragment($data->toarray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
        $this->assertDatabaseMissing($this->table, $old->toarray());
    }

    public function test_update_empty()
    {
        $data     = factory(Image::class)->create();
        $response = $this->put($this->url.$data->id, [], $this->headers());
        $response->assertStatus(422);
    }

    public function test_delete_image()
    {
        $data     = factory(Image::class)->create();
        $response = $this->delete($this->url.$data->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJson(['data' => collect($data)->except(['updated_at'])->toArray()]);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertSoftDeleted($this->table, collect($data)->except(['updated_at'])->toArray());
    }
}
