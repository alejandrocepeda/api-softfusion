<?php

namespace App\Http\Controllers\Api\Lead;

use App\Address;
use App\Contact;
use App\Http\Controllers\ApiController;
use App\Lead;
use Illuminate\Http\Request;

class LeadController extends ApiController
{
    /**
     * industryController constructor.
     */
    public function __construct()
    {
        // $this->middleware('auth:api')->except(['index', 'show','update','store','destroy']);
        // $this->middleware('client.credentials')->only(['index', 'show']);
        $this->middleware('auth:api')->except(['store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $leads = $this->permission(Lead::all(), 'executive_id');

        return $this->showAll($leads,Lead::class);
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
        $rules = ['email'=>'required|unique:contacts'];
        $this->validate($request, $rules);

        $lead = Lead::create($request->all());

        if ($request->has('email')) {
            //creamos el contacto

            $contact = Contact::create($request->all());
            $lead->contact()->associate($contact)->save();

            if ($request->has('address')) {
                //el contacto tiene direccion
                $address = Address::create($request->all());
                $contact->address()->associate($address)->save();
            }
        }

        return $this->successResponse(['data'=>$lead, 'message'=>'Lead Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Lead $lead
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Lead $lead)
    {
        return $this->showOne($lead);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request   $request
     * @param \App\Lead $lead
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Lead $lead)
    {
        $rules = [];
        $this->validate($request, $rules);

        $lead->fill($request->all());
        if ($lead->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $lead->save();

        return $this->successResponse(['data'=>$lead, 'message'=>'Lead updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Lead $lead
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Exception
     * @throws \Exception
     */
    public function destroy(Lead $lead)
    {
        $lead->delete();

        return $this->successResponse(['data'=>$lead, 'message'=>'Lead deleted']);
    }
}
