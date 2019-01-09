<?php

namespace App\Http\Controllers\Api\Activity;

use App\ActivitiesStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ActivitiesStatusController extends ApiController
{
    /**
     * imageController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show', 'update', 'store', 'destroy']);
        $this->middleware('client.credentials');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activitiesStatuss = ActivitiesStatus::all();

        return $this->showAll($activitiesStatuss,ActivitiesStatus::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ['name' => 'required'];
        $this->validate($request, $rules);
        $data = ActivitiesStatus::create($request->all());

        return $this->showOne($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ActivitiesStatus $activitiesStatus
     *
     * @return \Illuminate\Http\Response
     */
    public function show(ActivitiesStatus $activitiesStatus)
    {
        return $this->showOne($activitiesStatus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Image               $activitiesStatus
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActivitiesStatus $activitiesStatus)
    {
        $activitiesStatus->fill($request->all());
        if ($activitiesStatus->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $activitiesStatus->save();

        return $this->showOne($activitiesStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ActivitiesStatus $activitiesStatus
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActivitiesStatus $activitiesStatus)
    {
        $activitiesStatus->delete();

        return $this->showOne($activitiesStatus);
    }
}
