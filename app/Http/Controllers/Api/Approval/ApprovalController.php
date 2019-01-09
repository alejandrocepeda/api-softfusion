<?php

namespace App\Http\Controllers\Api\Approval;

use App\Approval;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ApprovalController extends ApiController
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
        $approvals = Approval::all();

        return $this->showAll($approvals,Approval::class);
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
        $rules = ['periodicity_id' => 'required|integer',
                  'amount'         => 'required|integer',
                  'status'         => 'required|boolean', ];
        $this->validate($request, $rules);
        $data = Approval::create($request->all());
	
		return $this->successResponse(['data'=>$data,'message'=>'Approval Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Approval $approval
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Approval $approval)
    {
        return $this->showOne($approval);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Image               $approval
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Approval $approval)
    {
        $approval->fill($request->all());
        if ($approval->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $approval->save();

        return $this->successResponse(['data'=>$approval, 'message'=>'Approval updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Approval $approval
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Approval $approval)
    {
        $approval->delete();

        return $this->showOne($approval);
    }
}
