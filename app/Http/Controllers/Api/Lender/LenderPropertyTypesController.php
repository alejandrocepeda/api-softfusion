<?php

namespace App\Http\Controllers\Api\Lender;

use App\Http\Controllers\ApiController;
use App\Lender;

/**
 * Class LenderPropertyTypesController.
 */
class LenderPropertyTypesController extends ApiController
{
    /**
     * LenderPropertyTypesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index']);
        $this->middleware('client.credentials')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Lender $lender
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Lender $lender)
    {
        $property_types = $lender->property_types;

        return $this->showAll($property_types,ParametersForm::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Lender $lender
     * @param             $property_type_id
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param \Illuminate\Http\Request $request
     */
    public function update(Lender $lender, $property_type_id)
    {
        $lender->property_types()->syncWithoutDetaching($property_type_id);
        $lender->refresh();
        $property_types = $lender->property_types;

        return $this->showAll($property_types);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Lender $lender
     * @param             $property_type_id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Lender $lender, $property_type_id)
    {
        $lender->property_types()->detach($property_type_id);
        $lender->refresh();
        $property_types = $lender->property_types;

        return $this->showAll($property_types);
    }
}
