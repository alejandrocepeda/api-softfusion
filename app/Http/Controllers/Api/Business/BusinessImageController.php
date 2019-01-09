<?php

namespace App\Http\Controllers\Api\Business;

use App\Business;
use App\Http\Controllers\ApiController;
use App\Image;
use Illuminate\Support\Facades\Storage;

class BusinessImageController extends ApiController
{
    /**
     * @param Business $business
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Business $business)
    {
        $image = $business->image();

        return $this->showOne($image);
    }

    /**
     * @param Business $business
     * @param Image    $image
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Business $business, Image $image)
    {
        if ($business->image) {
            Storage::disk('public')->delete($business->image->url);
            Image::destroy($business->image->id);
        }

        $business->image()->save($image);

        $business->refresh();

        return $this->successResponse(['data' => $business->image, 'message' => 'Image Attached'], 201);
    }
}
