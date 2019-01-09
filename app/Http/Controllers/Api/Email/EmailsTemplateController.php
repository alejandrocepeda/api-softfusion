<?php

namespace App\Http\Controllers\Api\Email;

use App\EmailsTemplate;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class EmailsTemplateController extends ApiController
{
    /**
     * EmailsTemplateController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show', 'update', 'store', 'destroy']);
        $this->middleware('client.credentials')->only(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $emailsTemplates = EmailsTemplate::all();

        return $this->showAll($emailsTemplates,EmailsTemplate::class);
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
        $rules = ['title'  => 'required', 'body' => 'required',
                  'status' => 'boolean', ];
        $this->validate($request, $rules);
        $data = EmailsTemplate::create($request->all());

        return $this->showOne($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $emailsTemplate = EmailsTemplate::findOrFail($id);

        return $this->showOne($emailsTemplate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\City                $emailsTemplate
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param int $id
     */
    public function update(Request $request, EmailsTemplate $emailsTemplate)
    {
        $emailsTemplate->fill($request->all());
        if ($emailsTemplate->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $emailsTemplate->save();

        return $this->showOne($emailsTemplate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\EmailsTemplate $emailsTemplate
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param int $id
     */
    public function destroy(EmailsTemplate $emailsTemplate)
    {
        $emailsTemplate->delete();

        return $this->showOne($emailsTemplate);
    }
}
