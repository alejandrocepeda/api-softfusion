<?php

namespace App\Http\Controllers\Api\Signature;

use App\Signature;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class SignatureController extends ApiController
{
    /**
     * LeadController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show', 'update', 'store', 'destroy']);
        $this->middleware('client.credentials');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $signature = Signature::all();

        return $this->showAll($signature,Signature::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $rules = ['application_id' => 'required', 'contact_id' => 'required'];
        $this->validate($request, $rules);

        $data = Signature::create($request->all());
	
		return $this->successResponse(['data' => $data, 'message' => 'Signature Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Signature $signature
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Signature $signature)
    {
        return $this->showOne($signature);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request        $request
     * @param \App\Signature $signature
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Signature $signature)
    {
        $signature->fill($request->all());
        if ($signature->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $signature->save();

        return $this->successResponse(['data'=>$signature, 'message'=>'Signature updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Signature $signature
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Exception
     * @throws \Exception
     */
    public function destroy(Signature $signature)
    {
        $signature->delete();

        return $this->showOne($signature);
    }
}
