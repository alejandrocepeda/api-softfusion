<?php

namespace App\Http\Controllers\Api\Document;

use App\DocumentType;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class DocumentTypeController extends ApiController
{
    /**
     * imageController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show', 'update', 'store', 'destroy']);
        $this->middleware('client.credentials');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentTypes = DocumentType::all();

        return $this->showAll($documentTypes,DocumentType::class);
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
        $rules = ['name'  => 'required', 'document_periodicity_id' => 'required|integer',
                  'status'=> 'required|boolean', ];
        $this->validate($request, $rules);
        $data = DocumentType::create($request->all());

        return $this->showOne($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\DocumentType $documentType
     *
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentType $documentType)
    {
        return $this->showOne($documentType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Image               $documentType
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DocumentType $documentType)
    {
        $documentType->fill($request->all());
        if ($documentType->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $documentType->save();

        return $this->showOne($documentType);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\DocumentType $documentType
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocumentType $documentType)
    {
        $documentType->delete();

        return $this->showOne($documentType);
    }
}
