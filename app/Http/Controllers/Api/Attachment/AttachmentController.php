<?php

namespace App\Http\Controllers\Api\Attachment;

use App\Attachment;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class AttachmentController extends ApiController
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
        $attachments = Attachment::all();

        return $this->showAll($attachments,Attachment::class);
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
        $rules = ['url' => 'required'];
        $this->validate($request, $rules);
        $data = Attachment::create($request->all());
	
		return $this->successResponse(['data'=>$data,'message'=>'Attachment Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Attachment $attachment
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Attachment $attachment)
    {
        return $this->showOne($attachment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Image               $attachment
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attachment $attachment)
    {
        $attachment->fill($request->all());
        if ($attachment->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $attachment->save();

        return $this->successResponse(['data'=>$attachment, 'message'=>'Attachment updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Attachment $attachment
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attachment $attachment)
    {
        $attachment->delete();

        return $this->showOne($attachment);
    }
}
