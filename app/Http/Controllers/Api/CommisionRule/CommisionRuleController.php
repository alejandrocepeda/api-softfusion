<?php

namespace App\Http\Controllers\Api\CommisionRule;

use App\CommisionRule;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CommisionRuleController extends ApiController
{
    /**
     * addressController constructor.
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
        $commisionRule = CommisionRule::all();

        return $this->showAll($commisionRule,CommisionRule::class);
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
        $rules = ['commision_type_id' => 'required|integer',
                  'dynamic_var_id'    => 'required|integer',
                  'math_operator_id'  => 'required|integer',
        'commision'                   => 'required', ];
        $this->validate($request, $rules);
        $data = CommisionRule::create($request->all());

        return $this->showOne($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $commisionRule = CommisionRule::findOrFail($id);

        return $this->showOne($commisionRule);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Address             $commisionRule
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, CommisionRule $commisionRule)
    {
        $commisionRule->fill($request->all());
        if ($commisionRule->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $commisionRule->save();

        return $this->showOne($commisionRule);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\CommisionRule $commisionRule
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy(CommisionRule $commisionRule)
    {
        $commisionRule->delete();

        return $this->showOne($commisionRule);
    }
}
