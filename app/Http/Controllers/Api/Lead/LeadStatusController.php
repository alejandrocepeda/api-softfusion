<?php

namespace App\Http\Controllers\Api\Lead;

use App\Http\Controllers\ApiController;
use App\LeadStatus;
use Illuminate\Http\Request;

class LeadStatusController extends ApiController
{
    /**
     * LeadStatusController constructor.
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
        $LeadStatus = LeadStatus::all();

        return $this->showAll($LeadStatus,LeadStatus::class);
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
        $rules = ['name'   => 'required',
                  'status' => 'boolean', ];
        $this->validate($request, $rules);
        $data = LeadStatus::create($request->all());

        return $this->showOne($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\LeadStatus $leadStatus
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(LeadStatus $leadStatus)
    {
        return $this->showOne($leadStatus);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request    $request
     * @param LeadStatus $leadStatus
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, LeadStatus $leadStatus)
    {
        $leadStatus->fill($request->all());
        if ($leadStatus->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $leadStatus->save();

        return $this->showOne($leadStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param LeadStatus $leadStatus
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Exception
     * @throws \Exception
     */
    public function destroy(LeadStatus $leadStatus)
    {
        $leadStatus->delete();

        return $this->showOne($leadStatus);
    }
}
