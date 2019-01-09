<?php

namespace App\Http\Controllers\Api\Industry;

use App\Http\Controllers\ApiController;
use App\Industry;
use Illuminate\Http\Request;

class industryController extends ApiController
{
    /**
     * industryController constructor.
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
        $industry = Industry::all();

        return $this->showAll($industry,Industry::class);
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
        $rules = ['name'   => 'required|string'];
        $this->validate($request, $rules);
        $data = Industry::create($request->all());
	
		return $this->successResponse(['data'=>$data,'message'=>'Industry Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Industry $industry
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Industry $industry)
    {
        return $this->showOne($industry);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Industry            $industry
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Industry $industry)
    {
        $industry->fill($request->all());
        if ($industry->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $industry->save();

        return $this->successResponse(['data'=>$industry, 'message'=>'Industry updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Industry $industry
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Industry $industry)
    {
        $industry->delete();

        return $this->showOne($industry);
    }
}
