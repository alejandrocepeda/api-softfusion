<?php

namespace App\Http\Controllers\Api\Lender;

use App\Http\Controllers\ApiController;
use App\Industry;
use App\Lender;

/**
 * Class LenderIndustryController.
 */
class LenderIndustryController extends ApiController
{
    /**
     * LenderIndustryController constructor.
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
        $industries = $lender->industries;

        return $this->showAll($industries,Industry::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Lender   $lender
     * @param \App\Industry $industry
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param \Illuminate\Http\Request $request
     */
    public function update(Lender $lender, Industry $industry)
    {
        $lender->industries()->syncWithoutDetaching($industry);

        return $this->successResponse(['data' => $industry, 'message' => 'Industry Attached'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Lender   $lender
     * @param \App\Industry $industry
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Lender $lender, Industry $industry)
    {
        $lender->industries()->detach($industry);

        return $this->successResponse(['data' => $industry, 'message' => 'Industry Detach']);
    }
}
