<?php

namespace App\Http\Controllers\Api\Contact;

use App\Contact;
use App\Http\Controllers\ApiController;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactImageController extends ApiController
{
    /**
     * @param Contact $contact
     *
     * @return \Illuminate\Http\JsonResponse
     *                                       Display a listing of the resource
     * @return \Illuminate\Http\Response
     */
    public function index(Contact $contact)
    {
        $image = $contact->image();

        return $this->showOne($image);
    }

    /* Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @param \App\Contact             $contact
    * @return \Illuminate\Http\Response
    */
    public function update(Contact $contact, Image $image)
    {
        if ($contact->image) {
            Storage::disk('public')->delete($contact->image->url);
            Image::destroy($contact->image->id);
        }

        $contact->image()->save($image);

        $contact->refresh();

        return $this->successResponse(['data' => $contact->image, 'message' => 'Image Attached'], 201);
    }
}
