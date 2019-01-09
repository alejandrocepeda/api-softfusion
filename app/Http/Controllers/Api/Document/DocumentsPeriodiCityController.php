<?php

namespace App\Http\Controllers\Api\DocumentsPeriodiCity;

use App\DocumentPeriodicity;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class DocumentsPeriodiCityController extends ApiController
{
    /**
     * imageController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentsPeriodiCitys = DocumentPeriodicity::all();

        return $this->showAll($documentsPeriodiCitys,DocumentPeriodicity::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ['name'  => 'required', 'periodicity_id' => 'required|integer',
                  'status'=> 'required|boolean', ];
        $this->validate($request, $rules);
        $data = DocumentPeriodicity::create($request->all());

        return $this->showOne($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\DocumentPeriodicity $documentsPeriodiCity
     *
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentPeriodicity $documentsPeriodiCity)
    {
        return $this->showOne($documentsPeriodiCity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Image               $documentsPeriodiCity
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DocumentPeriodicity $documentsPeriodiCity)
    {
        $documentsPeriodiCity->fill($request->all());
        if ($documentsPeriodiCity->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $documentsPeriodiCity->save();

        return $this->showOne($documentsPeriodiCity);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\DocumentPeriodicity $documentsPeriodiCity
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocumentPeriodicity $documentsPeriodiCity)
    {
        $documentsPeriodiCity->delete();

        return $this->showOne($documentsPeriodiCity);
    }
}
