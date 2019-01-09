<?php

namespace App\Http\Controllers\Api\Lender;

use App\Http\Controllers\ApiController;
use App\Lender;
use App\Product;

/**
 * Class LenderProductController.
 */
class LenderProductController extends ApiController
{
    /**
     * LenderProductController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index']);
        $this->middleware('client.credentials')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Lender $lender
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Lender $lender)
    {
        $products = $lender->products;

        return $this->showAll($products,Product::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Lender  $lender
     * @param \App\Product $product
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param \Illuminate\Http\Request $request
     */
    public function update(Lender $lender, Product $product)
    {
        $lender->products()->syncWithoutDetaching($product);

        return $this->successResponse(['data' => $product, 'message' => 'Product Attached'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Lender  $lender
     * @param \App\Product $product
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Lender $lender, Product $product)
    {
        $lender->products()->detach($product);

        return $this->successResponse(['data' => $product, 'message' => 'Product Detached']);
    }
}
