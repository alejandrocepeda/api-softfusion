<?php

namespace App\Http\Controllers\Api\Application;

use App\Application;
use App\Business;
use App\Http\Controllers\ApiController;
use App\Lead;
use Illuminate\Http\Request;

class applicationController extends ApiController
{
    /**
     * applicationController constructor.
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
        $application = Application::all();

        return $this->showAll($application,Application::class);
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
        $rules = ['lead_id'         => 'required|integer',
                  'loan_amount'     => 'sometimes|integer',
                  'product_id'      => 'sometimes|integer',
                  'loan_purpose_id' => 'sometimes|integer',
                  'business_id'     => 'sometimes|integer',
                  'processor_id'    => 'sometimes|integer', ];

        $this->validate($request, $rules);

        $lead = Lead::with('contact.business')->find($request->lead_id);

        if (!isset($lead->contact->business)) {
            // TODO:  create a businesss
            $business = Business::create();
            $lead->contact->business()->associate($business)->save();
        }

        $application = Application::create($request->all());

        if (!$request->has('business_id')) {
            $application->business()->associate($lead->contact->business ?: $business)->save();
        }

        return $this->successResponse(['data' => $application, 'message' => 'Application Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Application $application
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        return $this->showOne($application);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Application         $application
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        $application->fill($request->all());
        if ($application->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $application->save();

        return $this->successResponse(['data' => $application, 'message' => 'Application updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Application $application
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        $application->delete();

        return $this->successResponse(['data' => $application, 'message' => 'Application deleted']);
    }
}
