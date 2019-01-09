<?php

namespace App\Http\Controllers\Api\Country;

use App\Country;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

/**
 * Class countryController.
 */
class countryController extends ApiController
{
    /**
     * countryController constructor.
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
        $country = Country::all();

        return $this->showAll($country,Country::class);
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
        $rules = ['name' => 'required'];
        $this->validate($request, $rules);
        $data = Country::create($request->all());
	
		return $this->successResponse(['data' => $data, 'message' => 'Country Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Country $country
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param int $id
     */
    public function show(Country $country)
    {
        return $this->showOne($country);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Country             $country
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param int $id
     */
    public function update(Request $request, Country $country)
    {
        $country->fill($request->all());
        if ($country->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $country->save();

        return $this->successResponse(['data'=>$country, 'message'=>'Country updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Country $country
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param int $id
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return $this->showOne($country);
    }
}
