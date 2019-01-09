<?php

namespace App\Http\Controllers\Api\Document;

use App\Document;
use App\DocumentType;
use App\Http\Controllers\ApiController;

class DocumentTypeDocumentController extends ApiController
{
    /**
     * countryController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('client.credentials');
    }

    /**
     * @param \App\DocumentType $documentType
     *
     * @return mixed
     */
    public function index(DocumentType $documentType)
    {
        $documents = $documentType->documents;

        return $this->showAll($documents,Document::class);
    }
}
