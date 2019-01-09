<?php

namespace App\Http\Controllers\Api\YearsInBusiness;

use App\Http\Controllers\ApiController;
use App\YearsInBusiness;
use Illuminate\Http\Request;

/**
 * Class yearsInBusinessController.
 */
class yearsInBusinessController extends ApiController
{
    /**
     * countryController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
        $this->middleware('client.credentials')->only(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = YearsInBusiness::all()->sortBy('order')->values();

        return $this->showAll($data,YearsInBusiness::class);
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
        $rules = ['name' => 'required', 'value' => 'required'];
        $this->validate($request, $rules);
        $data = YearsInBusiness::create($request->all());
        
        return $this->successResponse(['data'=>$data,'message'=>'Years in Time Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\YearsInBusiness $yearsInBusiness
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param int $id
     */
    public function show(YearsInBusiness $yearsInBusiness)
    {
        return $this->showOne($yearsInBusiness);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\YearsInBusiness     $yearsInBusiness
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param int $id
     */
    public function update(Request $request, YearsInBusiness $yearsInBusiness)
    {
        $yearsInBusiness->fill($request->all());
        if ($yearsInBusiness->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $yearsInBusiness->save();
	
		return $this->successResponse(['data'=>$yearsInBusiness,'message'=>'Years in Time updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\YearsInBusiness $yearsInBusiness
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param int $id
     */
    public function destroy(YearsInBusiness $yearsInBusiness)
    {
        $yearsInBusiness->delete();

        return $this->showOne($yearsInBusiness);
    }
}
