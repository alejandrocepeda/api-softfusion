<?php

namespace Tests\Feature;

use App\Lender;
use App\Product;
use Tests\TestCase;

class LenderProductTest extends TestCase
{
    protected $url   = 'api/v1/lenders/';
    protected $table = 'lenders';

    public function test_lender_product_list()
    {
        $lender  = factory(Lender::class)->create();
        $product = factory(Product::class)->create();
        $lender->products()->attach($product);
        $response = $this->get($this->url.$lender->id.'/products', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($product->toarray()), $product->toarray());
        $response->assertJson(['data' => [$product->toarray()]]);
    }

    public function test_lender_product_attach()
    {
        $lender   = factory(Lender::class)->create();
        $product  = factory(Product::class)->create();
        $response = $this->put($this->url.$lender->id.'/products/'.$product->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($product->toarray()), $product->toarray());
        $response->assertJson(['data' => [$product->toarray()]]);
    }

    public function test_lender_product_dettach()
    {
        $lender  = factory(Lender::class)->create();
        $product = factory(Product::class)->create();
        $lender->products()->attach($product);
        $response = $this->delete($this->url.$lender->id.'/products/'.$product->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($product->toarray()), $product->toarray());
        $response->assertJsonMissing(['data' => [$product->toarray()]]);
    }
}
