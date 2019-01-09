<?php

namespace App\Http\Controllers\Api\Business;

use App\Address;
use App\Business;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class BusinessController extends ApiController
{
    /**
     * BusinessController constructor.
     */
    //public function __construct()
    //{
    //    $this->middleware('auth:api')->except(['index', 'show', 'update', 'store', 'destroy']);
    //    $this->middleware('client.credentials')->only(['index', 'show']);
    //}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $business = Business::all();

        return $this->showAll($business,Business::class);
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

        $business = Business::create($request->all());

        //Si tiene imagen se optimiza y se guarda
        // Business::fillImage($request, $business);

        if ($request->has('address')) {
            //el Business tiene direccion
            $address = Address::create($request->all());
            $business->address()->associate($address)->save();
        }

        return $this->successResponse(['data'=>$business, 'message'=>'Business Created'], 201);
    }

    /**
     * @param \App\Business $business
     *
     * @return mixed
     */
    public function show(business $business)
    {
        return $this->showOne($business);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Business            $business
     *
     * @return mixed
     */
    public function update(Request $request, business $business)
    {
        $rules = ['name' => 'required'];
        $this->validate($request, $rules);
        $business->fill($request->all());
        if ($business->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $business->save();

        return $this->successResponse(['data' => $business, 'message' => 'Business updated']);
    }

    /**
     * @param \App\Business $business
     *
     * @throws \Exception
     *
     * @return mixed
     */
    public function destroy(business $business)
    {
        $business->delete();

        return $this->successResponse(['data' => $business, 'message' => 'Business deleted']);
    }

    public function checkTaxId(Request $request)
    {
        $rules = ['federal_tax_id' => 'required'];
        $this->validate($request, $rules);

        $contact = Business::where('federal_tax_id', $request->federal_tax_id)->get()->first();

        if ($contact) {
            return $this->errorResponse(['data'             => $contact,
                                                  'message' => 'Tax ID already taken', ], 422);
        }

        return $this->successResponse(['data' => $request->all(), 'message' => 'Tax Id success']);
    }
}
