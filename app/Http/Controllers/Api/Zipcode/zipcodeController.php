<?php

namespace App\Http\Controllers\Api\Zipcode;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Zipcode as ZipcodeResource;
use App\Zipcode;
use Illuminate\Http\Request;

/**
 * Class zipcodeController.
 */
class zipcodeController extends ApiController
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
        $zipcode = Zipcode::all();

        return $this->showAll($zipcode,Zipcode::class);
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
        $rules = ['county' => 'required', 'city_id' => 'required|integer'];
        $this->validate($request, $rules);
        $data = Zipcode::create($request->all());
	
		return $this->successResponse(['data' => $data, 'message' => 'Zipcode Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Zipcode $zipcode)
    {
        return $this->showOne($zipcode);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Zipcode             $zipcode
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param int $id
     */
    public function update(Request $request, Zipcode $zipcode)
    {
        $zipcode->fill($request->all());
        if ($zipcode->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $zipcode->save();
        $zipcode = new ZipcodeResource($zipcode);

        return $this->showOne($zipcode);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Zipcode $zipcode
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param int $id
     */
    public function destroy(Zipcode $zipcode)
    {
        $zipcode->delete();
        $zipcode = new ZipcodeResource($zipcode);

        return $this->showOne($zipcode);
    }
}
