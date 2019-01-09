<?php

namespace App\Http\Controllers\Api\Lender;

use App\Http\Controllers\ApiController;
use App\Image;
use App\Lender;
use Illuminate\Support\Facades\Storage;

class LenderImageController extends ApiController
{
    /**
     * @param Lender $lender
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Lender $lender)
    {
        $image = $lender->image();

        return $this->showOne($image);
    }

    /**
     * @param Lender $lender
     * @param Image  $image
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Lender $lender, Image $image)
    {
        if ($lender->image) {
            Storage::disk('public')->delete($lender->image->url);
            Image::destroy($lender->image->id);
        }

        $lender->image()->save($image);

        $lender->refresh();

        return $this->successResponse(['data' => $lender->image, 'message' => 'Image Attached'], 201);
    }
}
