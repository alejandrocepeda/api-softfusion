<?php

namespace App\Http\Controllers\Api\Application;

use App\ApplicationStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ApplicationStatusController extends ApiController
{
    /**
     * ApplicationStatusController constructor.
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
        $applicationStatuses = ApplicationStatus::all();

        return $this->showAll($applicationStatuses,ApplicationStatus::class);
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
        $rules = ['name' => 'required', 'status' => 'boolean'];
        $this->validate($request, $rules);
        $data = ApplicationStatus::create($request->all());

        return $this->showOne($data, 201);
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
        $applicationStatus = ApplicationStatus::findOrFail($id);

        return $this->showOne($applicationStatus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\City                $applicationStatus
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param int $id
     */
    public function update(Request $request, ApplicationStatus $applicationStatus)
    {
        $applicationStatus->fill($request->all());
        if ($applicationStatus->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $applicationStatus->save();

        return $this->showOne($applicationStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ApplicationStatus $applicationStatus
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param int $id
     */
    public function destroy(ApplicationStatus $applicationStatus)
    {
        $applicationStatus->delete();

        return $this->showOne($applicationStatus);
    }
}
