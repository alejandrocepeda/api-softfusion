<?php

namespace App\Http\Controllers\Api\AnnualRevenue;

use App\AnnualRevenue;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

/**
 * Class annualRevenueController.
 */
class annualRevenueController extends ApiController
{
    /**
     * annualRevenueController constructor.
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
        $annualRevenue = AnnualRevenue::all();

        return $this->showAll($annualRevenue,AnnualRevenue::class);
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
        $rules = ['name'     => 'required', 'status' => 'boolean',
                  'notified' => 'boolean', ];
        $this->validate($request, $rules);
        $data = AnnualRevenue::create($request->all());
	
		return $this->successResponse(['data'=>$data,'message'=>'Annual Revenue Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\AnnualRevenue $annualRevenue
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param int $id
     */
    public function show(AnnualRevenue $annualRevenue)
    {
        return $this->showOne($annualRevenue);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\AnnualRevenue       $annualRevenue
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param int $id
     */
    public function update(Request $request, AnnualRevenue $annualRevenue)
    {
        $annualRevenue->fill($request->all());
        if ($annualRevenue->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $annualRevenue->save();

        return $this->showOne($annualRevenue);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\AnnualRevenue $annualRevenue
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param int $id
     */
    public function destroy(AnnualRevenue $annualRevenue)
    {
        $annualRevenue->delete();

        return $this->showOne($annualRevenue);
    }
}
