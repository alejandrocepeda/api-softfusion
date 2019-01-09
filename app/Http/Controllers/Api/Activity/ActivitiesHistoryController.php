<?php

namespace App\Http\Controllers\Api\Activity;

use App\ActivitiesHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ActivitiesHistoryController extends ApiController
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
        $activitiesHistory = ActivitiesHistory::all();

        return $this->showAll($activitiesHistory,ActivitiesHistory::class);
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
        $rules = ['activity_id' => 'required'];
        $this->validate($request, $rules);

        $data = ActivitiesHistory::create($request->all());

        return $this->showOne($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ActivitiesHistory $activitiesHistory
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ActivitiesHistory $activitiesHistory)
    {
        return $this->showOne($activitiesHistory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request                $request
     * @param \App\ActivitiesHistory $activitiesHistory
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, ActivitiesHistory $activitiesHistory)
    {
        $activitiesHistory->fill($request->all());
        if ($activitiesHistory->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $activitiesHistory->save();

        return $this->successResponse(['data'=>$activitiesHistory, 'message'=>'Activity History updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ActivitiesHistory $activitiesHistory
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Exception
     * @throws \Exception
     */
    public function destroy(ActivitiesHistory $activitiesHistory)
    {
        $activitiesHistory->delete();

        return $this->showOne($activitiesHistory);
    }
}
