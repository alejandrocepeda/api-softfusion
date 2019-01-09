<?php

namespace App\Http\Controllers\Api\SenderEmail;

use App\SenderEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class SenderEmailController extends ApiController
{
    /**
     * SenderEmailController constructor.
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
        $senderEmails = SenderEmail::all();

        return $this->showAll($senderEmails,SenderEmail::class);
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
        $rules = ['name'   => 'required', 'email' => 'required',
                  'status' => 'boolean', ];
        $this->validate($request, $rules);
        $data = SenderEmail::create($request->all());
	
		return $this->successResponse(['data' => $data, 'message' => 'Sender Email Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $senderEmail = SenderEmail::findOrFail($id);

        return $this->showOne($senderEmail);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\City                $senderEmail
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param int $id
     */
    public function update(Request $request, SenderEmail $senderEmail)
    {
        $senderEmail->fill($request->all());
        if ($senderEmail->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $senderEmail->save();

        return $this->showOne($senderEmail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\SenderEmail $senderEmail
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param int $id
     */
    public function destroy(SenderEmail $senderEmail)
    {
        $senderEmail->delete();

        return $this->showOne($senderEmail);
    }
}
