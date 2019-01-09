<?php

namespace App\Http\Controllers\Api\Periodicity;

use App\Document;
use App\Http\Controllers\ApiController;
use App\Periodicity;

class PeriodicityDocumentsPeriodicityController extends ApiController
{
    /**
     * PeriodicityDocumentsPeriodicityController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * @param \App\Http\Controllers\Api\Periodicity\Approval $periodiCity
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Periodicity $periodiCity)
    {
        //
        $documentsPreridiCity= $periodiCity->documentsPreridiCity;

        return $this->showAll($documentsPreridiCity,Document::class);
    }
}
