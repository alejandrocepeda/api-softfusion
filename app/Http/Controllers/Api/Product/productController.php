<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\ApiController;
use App\Product;
use Illuminate\Http\Request;

/**
 * Class productController.
 */
class productController extends ApiController
{
	/**
	 * productController constructor.
	 */
	public function __construct()
	{
		$this->middleware('auth:api')->except(['index', 'show', 'update', 'store', 'destroy']);
		$this->middleware('client.credentials')->only(['index', 'show']);
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index()
	{
		$product = Product::all();
		
		return $this->showAll($product,Product::class);
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(Request $request)
	{
		$rules = ['name' => 'required'];
		$this->validate($request, $rules);
		$product = Product::create($request->all());
		
		return $this->successResponse(['data' => $product, 'message' => 'Product Created'], 201);
		
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param \App\Product $product
	 * @return \Illuminate\Http\JsonResponse
	 * @internal param int $id
	 */
	public function show(Product $product)
	{
		return $this->showOne($product);
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \App\Product             $product
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(Request $request, Product $product)
	{
		$product->fill($request->all());
		if($product->isClean()){
			return $this->errorResponse('At least one different value must be specified to update', 422);
		}
		$product->save();
		
		return $this->successResponse(['data' => $product, 'message' => 'Product updated']);
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Product $product
	 * @throws \Exception
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function destroy(Product $product)
	{
		$product->delete();
		
		return $this->showOne($product);
	}
}
