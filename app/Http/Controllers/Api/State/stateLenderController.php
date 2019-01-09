<?php

namespace App\Http\Controllers\Api\State;

use App\Http\Controllers\ApiController;
use App\Lender;
use App\State;

class stateLenderController extends ApiController
{
    /**
     * stateLenderController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index']);
        $this->middleware('client.credentials')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\State $state
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(State $state)
    {
        $lenders = $state->lenders;

        return $this->showAll($lenders,Lender::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\State  $state
     * @param \App\Lender $lender
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(State $state, Lender $lender)
    {
        $state->lenders()->syncWithoutDetaching($lender);
        $state->refresh();
        $lenders = $state->lenders;

        return $this->showAll($lenders);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\State  $state
     * @param \App\Lender $lender
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(State $state, Lender $lender)
    {
        $state->lenders()->detach($lender);
        $state->refresh();
        $lenders = $state->lenders;

        return $this->showAll($lenders);
    }
}
