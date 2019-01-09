<?php

namespace App\Http\Controllers\Api\Address;

use App\Address;
use App\Http\Controllers\ApiController;
use App\Http\Resources\AddressResource;
use Illuminate\Http\Request;

class addressController extends ApiController
{
    /**
     * addressController constructor.
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
        $address = Address::all();

        return $this->showAll($address,Address::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Address::create($request->all());

        return $this->successResponse(['data'=>new AddressResource($data), 'message'=>'Address Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        return $this->showOne($address);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Address             $address
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $address->fill($request->all());
        if ($address->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $address->save();

        return $this->successResponse(['data'=>new AddressResource($address), 'message'=>'Address updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Address $address
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::findOrFail($id);
        $address->delete();

        return $this->showOne($address);
    }
}
