<?php

namespace App\Http\Controllers\Api\Application;

use App\Application;
use App\Document;
use App\Http\Controllers\ApiController;
use App\Http\Resources\ApplicationResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplicationDocumentController extends ApiController
{
	public function __construct()
	{
		$this->middleware('auth:api');
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Application $application)
	{
		$documents = $application->documents;
		
		dd($documents);
		
		return $this->showAll($documents,Document::class);
	}
	
	public function store(Request $request, Application $application)
	{
		$rules = ['document' => 'required|file'];
		$this->validate($request, $rules);
		
		$file = $request->file('document');
		
		$onlyNameAndExt = $file->getClientOriginalName();
		
		$withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $onlyNameAndExt);
		
		$filename = ('null' != $request->period ? str_slug($request->type . '-' . $request->period) : str_slug($request->type)) . '-' . str_slug($withoutExt) . '.' . $file->getClientOriginalExtension();
		
		$path = $file->storeAs('applications/' . $application->id, strtolower($filename), 'public');
		
		$application->documents()->create(['name'             => $onlyNameAndExt,
										   'url'              => Storage::url($path),
										   'size'             => $request->size,
										   'user_id'          => auth()->id(),
										   'period'           => 'null' != $request->period ? $request->period : null,
										   'document_type_id' => $request->document_type_id,]);
		
		$application->refresh();
		
		return $this->successResponse(['data'    => new ApplicationResource($application),
									   'message' => 'Document Created',], 201);
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Lead $application
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Application $application, Document $document)
	{
		$document->delete();
		
		return $this->successResponse(['data'    => new ApplicationResource($application),
									   'message' => 'Document Deleted',]);
	}
}
