<?php

namespace App\Http\Controllers\Api\ClientAdvanced;

use App\ClientAdvanced;
use App\Http\Controllers\ApiController;
use App\Http\Resources\ClientAdvancedResource;
use Illuminate\Http\Request;

class clientAdvancedController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advances = ClientAdvanced::all();

        return $this->showAll($advances,ClientAdvanced::class);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $rules = ['lender_id'      => 'required|integer',
                  'application_id' => 'required|integer',
                  'periodicity_id' => 'required|integer',
                  'payment'        => 'required|integer',
                  'amount'         => 'required|integer',
                  'funded_at'      => 'date', ];

        $this->validate($request, $rules);
        $data = ClientAdvanced::create($request->all());

        return $this->successResponse(['data'    => new ClientAdvancedResource($data),
                                       'message' => 'Client Advanced Created', ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ClientAdvanced $clientAdvanced
     *
     * @return \Illuminate\Http\Response
     */
    public function show(ClientAdvanced $clientAdvanced)
    {
        $this->showOne($clientAdvanced);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ClientAdvanced      $clientAdvanced
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientAdvanced $clientAdvanced)
    {
        $rules = ['lender_id'      => 'required|integer',
                  'application_id' => 'required|integer',
                  'periodicity_id' => 'required|integer',
                  'payment'        => 'required|integer',
                  'amount'         => 'required|integer',
                  'funded_at'      => 'date', ];
        $this->validate($request, $rules);

        $clientAdvanced->fill($request->all());
        if ($clientAdvanced->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $clientAdvanced->save();

        return $this->successResponse(['data' => $clientAdvanced, 'message' => 'Client Advanced updated']);
    }

    /**
     * @param ClientAdvanced $clientAdvanced
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Exception
     */
    public function destroy(ClientAdvanced $clientAdvanced)
    {
        $clientAdvanced->delete();

        return $this->successResponse(['data' => $clientAdvanced, 'message' => 'Client Advanced deleted']);
    }
}
