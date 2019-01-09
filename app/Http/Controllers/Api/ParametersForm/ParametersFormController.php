<?php

namespace App\Http\Controllers\Api\ParametersForm;

use App\Http\Controllers\ApiController;
use App\ParametersForm;
use Illuminate\Http\Request;

/**
 * Class ParametersFormController.
 */
class ParametersFormController extends ApiController
{
    /**
     * ParametersFormController constructor.
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
        $data = ParametersForm::all();

        return $this->showAll($data,ParametersForm::class);
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
        $rules = ['name' => 'required', 'parameters_form_category_id' => 'required'];
        $this->validate($request, $rules);
        $data = ParametersForm::create($request->all());
	
		return $this->successResponse(['data' => $data, 'message' => 'Item Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param \App\ParametersForm $parametersForm
     */
    public function show($id)
    {
        $parametersForm = ParametersForm::with('category')->whereId($id)->first();

        return $this->showOne($parametersForm);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ParametersForm      $parametersForm
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, ParametersForm $parametersForm)
    {
        $parametersForm->fill($request->all());
        if ($parametersForm->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $parametersForm->save();

        return $this->showOne($parametersForm);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ParametersForm $parametersForm
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(ParametersForm $parametersForm)
    {
        $parametersForm->delete();

        return $this->showOne($parametersForm);
    }
}
