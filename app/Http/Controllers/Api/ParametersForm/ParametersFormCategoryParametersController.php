<?php

namespace App\Http\Controllers\Api\ParametersForm;

use App\Http\Controllers\ApiController;
use App\ParametersFormCategory;

/**
 * Class ParametersFormCategoryParametersController.
 */
class ParametersFormCategoryParametersController extends ApiController
{
    /**
     * ParametersFormCategoryParametersController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\ParametersFormCategory $parametersFormCategory
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ParametersFormCategory $parametersFormCategory)
    {
        return $this->showAll($parametersFormCategory->parameters,ParametersFormCategory::class);
    }
}
