<?php

namespace App\Http\Controllers\Api\LoanPurpose;

use App\Http\Controllers\ApiController;
use App\LoanPurpose;
use Illuminate\Http\Request;

/**
 * Class loanPurposeController.
 */
class loanPurposeController extends ApiController
{
    /**
     * loanPurposeController constructor.
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
        $data = LoanPurpose::all();

        return $this->showAll($data,LoanPurpose::class);
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
        $data = LoanPurpose::create($request->all());
	
		return $this->successResponse(['data'=>$data, 'message'=>'Loan Purpose Created'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\LoanPurpose $loanPurpose
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(LoanPurpose $loanPurpose)
    {
        return $this->showOne($loanPurpose);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\LoanPurpose         $loanPurpose
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, LoanPurpose $loanPurpose)
    {
        $loanPurpose->fill($request->all());
        if ($loanPurpose->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $loanPurpose->save();

        return $this->successResponse(['data'=>$loanPurpose, 'message'=>'Loan Purpose updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\LoanPurpose $loanPurpose
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(LoanPurpose $loanPurpose)
    {
        $loanPurpose->delete();

        return $this->showOne($loanPurpose);
    }
}
