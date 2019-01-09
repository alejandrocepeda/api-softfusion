<?php

namespace App\Http\Controllers\Api\City;

use App\City;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

/**
 * Class cityController.
 */
class cityController extends ApiController
{
    /**
     * cityController constructor.
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
        $city = City::all();

        return $this->showAll($city,City::class);
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
        $rules = ['name' => 'required', 'state_id' => 'required|integer'];
        $this->validate($request, $rules);
        $data = City::create($request->all());
	
		return $this->successResponse(['data' => $data, 'message' => 'City Created'], 201);
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
        $city = City::with('state.country')->findOrFail($id);

        return $this->showOne($city);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\City                $city
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param int $id
     */
    public function update(Request $request, City $city)
    {
        $city->fill($request->all());
        if ($city->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $city->save();

        return $this->successResponse(['data'=>$city, 'message'=>'City updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\City $city
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param int $id
     */
    public function destroy(City $city)
    {
        $city->delete();

        return $this->showOne($city);
    }
}
