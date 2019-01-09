<?php

namespace App\Http\Controllers\Api\MathOperator;

use App\MathOperator;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class MathOperatorController extends ApiController
{
    /**
     * addressController constructor.
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
        $mathOperator = MathOperator::all();

        return $this->showAll($mathOperator,MathOperator::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ['name' => 'required', 'value'=>'integer'];
        $this->validate($request, $rules);
        $data = MathOperator::create($request->all());

        return $this->showOne($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $mathOperator = MathOperator::findOrFail($id);

        return $this->showOne($mathOperator);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Address             $mathOperator
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, MathOperator $mathOperator)
    {
        $mathOperator->fill($request->all());
        if ($mathOperator->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $mathOperator->save();

        return $this->showOne($mathOperator);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\MathOperator $mathOperator
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy(MathOperator $mathOperator)
    {
        $mathOperator->delete();

        return $this->showOne($mathOperator);
    }
}
