<?php

namespace App\Http\Controllers\Api\Activity;

use App\ActivitiesType;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ActivitiesTypeController extends ApiController
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
        $activitiesTypes = ActivitiesType::all();

        return $this->showAll($activitiesTypes,ActivitiesType::class);
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
        $rules = ['name'   => 'required',
                  'status' => 'boolean', ];
        $this->validate($request, $rules);
        $data = ActivitiesType::create($request->all());

        return $this->showOne($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ActivitiesType $activitiesType
     *
     * @return \Illuminate\Http\Response
     */
    public function show(ActivitiesType $activitiesType)
    {
        return $this->showOne($activitiesType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Image               $activitiesType
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActivitiesType $activitiesType)
    {
        $activitiesType->fill($request->all());
        if ($activitiesType->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $activitiesType->save();

        return $this->showOne($activitiesType);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ActivitiesType $activitiesType
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActivitiesType $activitiesType)
    {
        $activitiesType->delete();

        return $this->showOne($activitiesType);
    }
}
