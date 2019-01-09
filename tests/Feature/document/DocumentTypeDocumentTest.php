<?php

namespace Tests\Feature;

use App\Document;
use Tests\TestCase;

class DocumentTypeDocumentTest extends TestCase
{
    /**
     * A basic test example.
     */
    protected $url   = 'api/v1/document-types/';
    protected $table = 'documents';

    /**
     * A basic test example.
     */
    public function test_list_document_type_document()
    {
        $data     = factory(Document::class)->create();
        $response = $this->get($this->url.$data->document_type_id.'/documents', $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }
}
