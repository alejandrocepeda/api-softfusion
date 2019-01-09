<?php

namespace App\Http\Controllers\Api\CommisionRule;

use App\CommisionsType;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CommisionsTypeController extends ApiController
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
        $commisionsType = CommisionsType::all();

        return $this->showAll($commisionsType,CommisionsType::class);
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
        $rules = ['name' => 'required'];
        $this->validate($request, $rules);
        $data = CommisionsType::create($request->all());

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
        $commisionsType = CommisionsType::findOrFail($id);

        return $this->showOne($commisionsType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Address             $commisionsType
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, CommisionsType $commisionsType)
    {
        $commisionsType->fill($request->all());
        if ($commisionsType->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $commisionsType->save();

        return $this->showOne($commisionsType);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\CommisionsType $commisionsType
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy(CommisionsType $commisionsType)
    {
        $commisionsType->delete();

        return $this->showOne($commisionsType);
    }
}
