<?php

namespace App\Http\Controllers\Api\Lender;

use App\Http\Controllers\ApiController;
use App\Lender;
use App\State;

/**
 * Class LenderStateController.
 */
class LenderStateController extends ApiController
{
    /**
     * LenderStateController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
        $this->middleware('client.credentials')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Lender $lender
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Lender $lender)
    {
        $states = $lender->states;

        return $this->showAll($states,State::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Lender $lender
     * @param \App\State  $state
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param \Illuminate\Http\Request $request
     */
    public function update(Lender $lender, State $state)
    {
        $lender->states()->syncWithoutDetaching($state);

        return $this->successResponse(['data' => $state, 'message' => 'State Attached'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Lender $lender
     * @param \App\State  $state
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Lender $lender, State $state)
    {
        $lender->states()->detach($state);

        return $this->successResponse(['data' => $state, 'message' => 'State Detach']);
    }
}
