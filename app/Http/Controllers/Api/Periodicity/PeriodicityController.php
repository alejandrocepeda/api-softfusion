<?php

namespace App\Http\Controllers\Api\Periodicity;

use App\Periodicity;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class PeriodicityController extends ApiController
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
        $periodiCitys = Periodicity::all();

        return $this->showAll($periodiCitys,Periodicity::class);
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
        $rules = ['name'   => 'required',
                  'value'  => 'integer',
                  'status' => 'boolean', ];
        $this->validate($request, $rules);
        $data = Periodicity::create($request->all());
	
		return $this->successResponse(['data' => $data, 'message' => 'Periodicity Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Approval $periodiCity
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Periodicity $periodiCity)
    {
        return $this->showOne($periodiCity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Image               $periodiCity
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Periodicity $periodiCity)
    {
        $periodiCity->fill($request->all());
        if ($periodiCity->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $periodiCity->save();

        return $this->successResponse(['data'=>$periodiCity, 'message'=>'Periodicity updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Approval $periodiCity
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periodicity $periodiCity)
    {
        $periodiCity->delete();

        return $this->showOne($periodiCity);
    }
}
