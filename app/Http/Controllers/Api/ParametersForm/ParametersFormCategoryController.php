<?php

namespace App\Http\Controllers\Api\ParametersForm;

use App\Http\Controllers\ApiController;
use App\ParametersFormCategory;
use Illuminate\Http\Request;

/**
 * Class ParametersFormCategoryController.
 */
class ParametersFormCategoryController extends ApiController
{
    /**
     * ParametersFormCategoryController constructor.
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
        $data = ParametersFormCategory::all();

        return $this->showAll($data,ParametersFormCategory::class);
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
        $data = ParametersFormCategory::create($request->all());

        return $this->showOne($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ParametersFormCategory $parametersFormCategory
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ParametersFormCategory $parametersFormCategory)
    {
        return $this->showOne($parametersFormCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request    $request
     * @param \App\ParametersFormCategory $parametersFormCategory
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, ParametersFormCategory $parametersFormCategory)
    {
        $parametersFormCategory->fill($request->all());
        if ($parametersFormCategory->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $parametersFormCategory->save();

        return $this->showOne($parametersFormCategory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ParametersFormCategory $parametersFormCategory
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(ParametersFormCategory $parametersFormCategory)
    {
        $parametersFormCategory->delete();

        return $this->showOne($parametersFormCategory);
    }
}
