<?php

namespace App\Http\Controllers\Api\Activity;

use App\CallStatus;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class ActivityCallStatusController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CallStatus::all();

        return $this->showAll($data,CallStatus::class);
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
        $rules = [];
        $this->validate($request, $rules);
        $data = CallStatus::create($request->all());

        return $this->showOne($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\CallStatus $callStatus
     *
     * @return \Illuminate\Http\Response
     */
    public function show(CallStatus $callStatus)
    {
        return $this->showOne($callStatus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\CallStatus          $callStatus
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CallStatus $callStatus)
    {
        $callStatus->fill($request->all());
        if ($callStatus->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $callStatus->save();

        return $this->successResponse(['data'=>$callStatus, 'message'=>'Call Status updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\CallStatus $callStatus
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(CallStatus $callStatus)
    {
        $callStatus->delete();

        return $this->showOne($callStatus);
    }
}
