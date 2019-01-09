<?php

namespace App\Http\Controllers\Api\Product;

use App\Application;
use App\Product;
use App\Http\Controllers\ApiController;

class ProductApplicationController extends ApiController
{
    /**
     * ProductApplicationController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * @param \App\Http\Controllers\Api\Product\Product $product
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Product $product)
    {
        //
        $applications= $product->applications;

        return $this->showAll($applications,Application::class);
    }
}
