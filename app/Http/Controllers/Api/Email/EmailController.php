<?php

namespace App\Http\Controllers\Api\Email;

use App\Email;
use App\Http\Controllers\ApiController;
use App\User;
use Illuminate\Http\Request;

class EmailController extends ApiController
{
    /**
     * EmailController constructor.
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
        $emails = Email::all();

        return $this->showAll($emails,Email::class);
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
        $rules = ['subject' => 'required', 'body' => 'required'];
        $this->validate($request, $rules);

        $data = Email::create($request->all());
        User::findorfail(collect($request->from)->pluck('id')->first())->emails()->save($data);

        $data->contact()->attach(collect($request->to)->pluck('id'), ['type' => 'to']);
        $data->contact()->attach(collect($request->cc)->pluck('id'), ['type' => 'cc']);
        $data->contact()->attach(collect($request->bcc)->pluck('id'), ['type' => 'bcc']);

        return $this->successResponse(['data' => $data, 'message' => 'Email Created'], 201);
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
        $email = Email::findOrFail($id);

        return $this->showOne($email);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\City                $email
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param int $id
     */
    public function update(Request $request, Email $email)
    {
        $email->fill($request->all());
        if ($email->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $email->save();

        return $this->successResponse(['data' => $email, 'message' => 'Email updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Email $email
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @internal param int $id
     */
    public function destroy(Email $email)
    {
        $email->delete();

        return $this->showOne($email);
    }
}
