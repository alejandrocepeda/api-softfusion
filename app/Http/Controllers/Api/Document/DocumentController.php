<?php

namespace App\Http\Controllers\Api\Document;

use App\Document;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends ApiController
{
	/**
	 * imageController constructor.
	 */
	public function __construct()
	{
		$this->middleware('auth:api')->except(['index', 'show', 'update', 'destroy']);
		$this->middleware('client.credentials');
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$documents = Document::all();
		
		return $this->showAll($documents,Document::class);
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$rules = ['document_type_id' => 'required|integer'];
		
		$this->validate($request, $rules);
		
		$request->request->add(['user_id' => Auth::id()]);
		
		$data = Document::create($request->all());
		
		return $this->successResponse(['data' => $data, 'message' => 'Document Created'], 201);
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param \App\Document $document
	 * @return \Illuminate\Http\Response
	 */
	public function show(Document $document)
	{
		return $this->showOne($document);
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \App\Image               $document
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Document $document)
	{
		$document->fill($request->all());
		if($document->isClean()){
			return $this->errorResponse('At least one different value must be specified to update', 422);
		}
		
		$document->save();
		
		return $this->successResponse(['data' => $document, 'message' => 'Document updated']);
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Document $document
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Document $document)
	{
		$document->delete();
		
		return $this->showOne($document);
	}
}
