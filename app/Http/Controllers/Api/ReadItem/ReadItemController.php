<?php

namespace App\Http\Controllers\Api\ReadItem;

use App\ReadItem;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ReadItemController extends ApiController
{
    /**
     * ReadItemController constructor.
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
        $readItems = ReadItem::all();

        return $this->showAll($readItems,ReadItem::class);
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
        $rules = ['user_id' => 'required', 'read' => 'boolean'];
        $this->validate($request, $rules);
        $data = ReadItem::create($request->all());

        return $this->showOne($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ReadItem $readItem
     *
     * @return \Illuminate\Http\Response
     */
    public function show(ReadItem $readItem)
    {
        return $this->showOne($readItem);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Image               $readItem
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReadItem $readItem)
    {
        $readItem->fill($request->all());
        if ($readItem->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $readItem->save();

        return $this->showOne($readItem);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ReadItem $readItem
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReadItem $readItem)
    {
        $readItem->delete();

        return $this->showOne($readItem);
    }
}
