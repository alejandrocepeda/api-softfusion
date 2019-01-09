<?php

namespace App\Http\Controllers\Api\HowDoYouHear;

use App\HowDoYouHear;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

/**
 * Class HowDoYouHearController.
 */
class HowDoYouHearController extends ApiController
{
    /**
     * HowDoYouHearController constructor.
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
        $data = HowDoYouHear::all();

        return $this->showAll($data,HowDoYouHear::class);
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
        $rules = ['name'   => 'required',
                  'status' => 'boolean', ];
        $this->validate($request, $rules);
        $data = HowDoYouHear::create($request->all());
	
		return $this->successResponse(['data' => $data, 'message' => 'Item Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\HowDoYouHear $howDoYouHear
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(HowDoYouHear $howDoYouHear)
    {
        return $this->showOne($howDoYouHear);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\HowDoYouHear        $howDoYouHear
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, HowDoYouHear $howDoYouHear)
    {
        $howDoYouHear->fill($request->all());
        if ($howDoYouHear->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $howDoYouHear->save();

        return $this->successResponse(['data'=>$howDoYouHear, 'message'=>'How Do You Hear updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\HowDoYouHear $howDoYouHear
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(HowDoYouHear $howDoYouHear)
    {
        $howDoYouHear->delete();

        return $this->showOne($howDoYouHear);
    }
}
