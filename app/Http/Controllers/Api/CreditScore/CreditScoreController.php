<?php

namespace App\Http\Controllers\Api\CreditScore;

use App\CreditScore;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

/**
 * Class CreditScoreController.
 */
class CreditScoreController extends ApiController
{
    /**
     * CreditScoreController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show', 'update', 'store', 'destroy']);
        $this->middleware('client.credentials')->only(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index()
    {
        $creditScores = CreditScore::all();

        return $this->showAll($creditScores,CreditScore::class);
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
        $rules = ['name'   => 'required', 'value' => 'required',
                  'status' => 'boolean', ];
        $this->validate($request, $rules);
        $data = CreditScore::create($request->all());
	
		return $this->successResponse(['data' => $data, 'message' => 'Credit Score Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\CreditScore $creditScore
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function show(CreditScore $creditScore)
    {
        return $this->showOne($creditScore);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\CreditScore         $creditScore
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, CreditScore $creditScore)
    {
        $creditScore->fill($request->all());
        if ($creditScore->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }
        $creditScore->save();

        return $this->successResponse(['data'=>$creditScore, 'message'=>'Credit Score updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\CreditScore $creditScore
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy(CreditScore $creditScore)
    {
        $creditScore->delete();

        return $this->showOne($creditScore);
    }
}
