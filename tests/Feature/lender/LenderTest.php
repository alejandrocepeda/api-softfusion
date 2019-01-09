<?php

namespace Tests\Feature;

use App\Http\Resources\LenderResource;
use App\Lender;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class LenderTest extends TestCase
{
    protected $url   = 'api/v1/lenders/';
    protected $table = 'lenders';

    /**
     * A basic test example.
     */
    public function test_list_lender()
    {
        $data     = factory(Lender::class)->create();
        $response = $this->get($this->url, $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_show_lender()
    {
        $data = factory(Lender::class)->create();
        $this->assertDatabaseHas($this->table, $data->toarray());
        $response = $this->get($this->url.$data->id, $this->headers());
        $data     = collect(new LenderResource($data));
        $response->assertStatus(200);
        $response->assertJson(['data' => $data->toarray()]);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
    }

    public function test_create_lender()
    {
        $data     = factory(Lender::class)->make();
        $response = $this->post($this->url, $data->toarray(), $this->headers());
        $response->assertStatus(201);
        $this->assertDatabaseHas($this->table, $data->toarray());
        $data = collect(new LenderResource($data));
        $response->assertJsonFragment($data->except(['id', 'created_at', 'updated_at'])->toarray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
    }

    public function test_create_lender_with_image()
    {
        $data     = factory(Lender::class)->states('image')->make();
        $response = $this->post($this->url, $data->toarray(), $this->headers());
        $response->assertStatus(201);
        $this->assertDatabaseHas($this->table, collect($data)->except('image')->toarray());
        $data = collect(new LenderResource($data));
        $response->assertJsonFragment($data->except(['id', 'created_at', 'updated_at', 'image'])->toArray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());

        //image
        $user     = json_decode($response->getContent());
        $response = $this->get($this->url.$user->data->id, $this->headers());
        $response->assertStatus(200);
        $image = json_decode($response->getContent());
        $image = $image->data->image;
        $this->assertDatabaseHas('images', (array) $image);
        Storage::disk('public')->assertExists($image->url);
    }

    public function test_update_lender()
    {
        $old      = factory(Lender::class)->create();
        $data     = factory(Lender::class)->make();
        $response = $this->put($this->url.$old->id, $data->toarray(), $this->headers());
        $response->assertStatus(200);
        $this->assertDatabaseHas($this->table, $data->toarray());
        $this->assertDatabaseMissing($this->table, $old->toarray());

        $data = collect(new LenderResource($data));
        $response->assertJsonFragment($data->except(['id', 'created_at', 'updated_at'])->toarray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
    }

    public function test_update_lender_with_image()
    {
        $data      = factory(Lender::class)->states(['image', 'dates'])->make();
        $response  = $this->post($this->url, $data->toarray(), $this->headers());
        $user      = json_decode($response->getContent());
        $image_old = $user->data->image;

        $data      = factory(Lender::class)->states(['image', 'dates'])->make();
        $response  = $this->put($this->url.$user->data->id, $data->toarray(), $this->headers());
        $user      = json_decode($response->getContent());
        $image_new = $user->data->image;

        $this->assertDatabaseHas('images', (array) $image_new);
        $this->assertDatabaseMissing('images', (array) $image_old);

        Storage::disk('public')->assertMissing($image_old->url);
        Storage::disk('public')->assertExists($image_new->url);
    }

    public function test_delete_lender()
    {
        $data     = factory(Lender::class)->create();
        $response = $this->delete($this->url.$data->id, [], $this->headers());
        $response->assertStatus(200);
        $this->assertSoftDeleted($this->table, $data->toarray());
        $data = collect(new LenderResource($data));
        $response->assertJsonFragment($data->except(['updated_at'])->toArray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
    }
}
