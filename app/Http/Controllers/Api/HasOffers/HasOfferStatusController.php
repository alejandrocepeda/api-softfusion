<?php

namespace App\Http\Controllers\Api\HasOffers;

use App\HasOfferStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class HasOfferStatusController extends ApiController
{
    /**
     * HasOfferStatusController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show', 'update', 'store', 'destroy']);
        $this->middleware('client.credentials')->only(['index', 'show']);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $hasOfferStatuses = HasOfferStatus::all();

        return $this->showAll($hasOfferStatuses,HasOfferStatus::class);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $rules = ['name' => 'required|string', 'status' => 'boolean'];
        $this->validate($request, $rules);
        $data = HasOfferStatus::create($request->all());

        return $this->showOne($data, 201);
    }

    /**
     * @param \App\Http\Controllers\Api\HasOfferStatus\HasOfferStatuses $hasOfferStatuses
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(HasOfferStatus $hasOfferStatus)
    {
        return $this->showOne($hasOfferStatus);
    }

    /**
     * @param \Illuminate\Http\Request                                  $request
     * @param \App\Http\Controllers\Api\HasOfferStatus\HasOfferStatuses $hasOfferStatuses
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, HasOfferStatus $hasOfferStatus)
    {
        $hasOfferStatus->fill($request->all());
        if ($hasOfferStatus->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $hasOfferStatus->save();

        return $this->showOne($hasOfferStatus);
    }

    /**
     * @param \App\Http\Controllers\Api\HasOfferStatus\HasOfferStatuses $hasOfferStatuses
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(HasOfferStatus $hasOfferStatus)
    {
        $hasOfferStatus->delete();

        return $this->showOne($hasOfferStatus);
    }
}
