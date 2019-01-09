<?php

namespace App\Http\Controllers\Api\Team;

use App\Team;
use App\Http\Controllers\ApiController;
use App\Image;
use Illuminate\Support\Facades\Storage;

class TeamImageController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Team $team)
    {
        $data = $team->image();


        return $this->showOne($data);
    }

    /* Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @param \App\Team             $team
    * @return \Illuminate\Http\Response
    */
    public function update(Team $team, Image $image)
    {

        if ($team->image) {
            Storage::disk('public')->delete($team->image->url);
            Image::destroy($team->image->id);
        }

        $team->image()->save($image);

        $team->refresh();

        return $this->successResponse(['data' => $team->image, 'message' => 'Image Attached'], 201);
    }
}
