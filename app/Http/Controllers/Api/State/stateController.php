<?php

namespace App\Http\Controllers\Api\State;

use App\Http\Controllers\ApiController;
use App\State;
use Illuminate\Http\Request;

/**
 * Class stateController.
 */
class stateController extends ApiController
{
    /**
     * stateController constructor.
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
        $state = State::all();

        return $this->showAll($state,State::class);
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
        $rules = ['name' => 'required', 'country_id' => 'required|integer'];
        $this->validate($request, $rules);
        $data = State::create($request->all());
	
		return $this->successResponse(['data' => $data, 'message' => 'State Created'], 201);
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
        $state = State::with('country')->findOrFail($id);

        return $this->showOne($state);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\State               $state
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param int $id
     */
    public function update(Request $request, State $state)
    {
        $state->fill($request->all());
        if ($state->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $state->save();

        return $this->successResponse(['data'=>$state, 'message'=>'State updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\State $state
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param int $id
     */
    public function destroy(State $state)
    {
        $state->delete();

        return $this->showOne($state);
    }
}
