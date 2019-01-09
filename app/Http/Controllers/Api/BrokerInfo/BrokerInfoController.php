<?php

namespace App\Http\Controllers\Api\BrokerInfo;

use App\BrokerInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class BrokerInfoController extends ApiController
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
        $brokerInfos = BrokerInfo::all();

        return $this->showAll($brokerInfos,BrokerInfo::class);
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
        $data = BrokerInfo::create($request->all());
	
		return $this->successResponse(['data' => $data, 'message' => 'Broker Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\BrokerInfo $brokerInfo
     *
     * @return \Illuminate\Http\Response
     */
    public function show(BrokerInfo $brokerInfo)
    {
        return $this->showOne($brokerInfo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Image               $brokerInfo
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BrokerInfo $brokerInfo)
    {
        $brokerInfo->fill($request->all());
        if ($brokerInfo->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $brokerInfo->save();

        return $this->successResponse(['data'=>$brokerInfo, 'message'=>'Broker Info updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\BrokerInfo $brokerInfo
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(BrokerInfo $brokerInfo)
    {
        $brokerInfo->delete();

        return $this->showOne($brokerInfo);
    }
}
