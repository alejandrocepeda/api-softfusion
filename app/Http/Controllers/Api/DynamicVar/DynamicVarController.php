<?php

namespace App\Http\Controllers\Api\DynamicVar;

use App\DynamicVar;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class DynamicVarController extends ApiController
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
        $dynamicVar = DynamicVar::all();

        return $this->showAll($dynamicVar,DynamicVar::class);
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
        $rules = ['name'  => 'required',
                  'status'=> 'boolean', ];
        $this->validate($request, $rules);
        $data = DynamicVar::create($request->all());

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
        $dynamicVar = DynamicVar::findOrFail($id);

        return $this->showOne($dynamicVar);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Address             $dynamicVar
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, DynamicVar $dynamicVar)
    {
        $dynamicVar->fill($request->all());
        if ($dynamicVar->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $dynamicVar->save();

        return $this->showOne($dynamicVar);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\DynamicVar $dynamicVar
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy(DynamicVar $dynamicVar)
    {
        $dynamicVar->delete();

        return $this->showOne($dynamicVar);
    }
}
