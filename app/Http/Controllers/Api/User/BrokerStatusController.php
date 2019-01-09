<?php

namespace App\Http\Controllers\Api\User;

use App\BrokerStatus;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class BrokerStatusController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showAll(BrokerStatus::all(),BrokerStatus::class);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\BrokerStatus $brokerStatus
     *
     * @return \Illuminate\Http\Response
     */
    public function show(BrokerStatus $brokerStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\BrokerStatus        $brokerStatus
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BrokerStatus $brokerStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\BrokerStatus $brokerStatus
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(BrokerStatus $brokerStatus)
    {
        //
    }
}
