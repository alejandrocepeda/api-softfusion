<?php

namespace App\Http\Controllers\Api\Image;

use App\Http\Controllers\ApiController;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as ImageIntervention;

class imageController extends ApiController
{
    /**
     * addressController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show', 'update', 'store', 'destroy']);
        $this->middleware('client.credentials')->only(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = $this->permission(Image::all(), 'id');

        return $this->showAll($images,Image::class);
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
        $rules = ['image' => 'required|image'];
        $this->validate($request, $rules);

        $file = $request->file('image');

        $path = $file->hashName('avatars');

        $image = ImageIntervention::make($file);

        $image->fit(400, 400);

        $name = $file->getClientOriginalName();

        Storage::disk('public')->put($path, (string) $image->encode());

        $image = Image::create(['name' => $name,
                                'url'  => Storage::url($path), ]);

        return $this->successResponse(['data' => $image, 'message' => 'Image Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Image $image
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        return $this->showOne($image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Image               $image
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        $image->fill($request->all());
        if ($image->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $image->save();

        return $this->successResponse(['data' => $image, 'message' => 'Image updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Image $image
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $image->delete();

        return $this->showOne($image);
    }
}
