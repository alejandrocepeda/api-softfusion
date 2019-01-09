<?php

namespace App;

use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Imagen;

class Image extends Model
{
    use SoftDeletes, TransformDates;

    protected $dates    = ['created_at', 'updated_at', 'deleted_at'];
    protected $hidden   = ['imagentable_id', 'imagentable_type','deleted_at','created_at','updated_at'];
    protected $fillable = ['url', 'name', 'imagentable_id', 'imagentable_type'];

    /**
     * @param $image
     * @param $folder
     */
    public static function storageImage($file, $folder, $width = 400, $height = 400)
    {
        $name  = uniqid($folder.'-', false).'.'.$file->extension();
        $path  = $folder.'/'.$name;
        $image = Imagen::make($file)->fit($width, $height)->stream($file->extension(), 70);
        Storage::disk('public')->put($path, $image);
        $image = self::create(['name' => $file->getClientOriginalName(), 'url' => $path]);

        return $image;
    }

    /**
     * @param $value
     *
     * @return string
     */
    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = strtolower($value);
    }

    /**
     * @param $value
     *
     * @return string
     */
    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    /*
    |--------------------------------------------------------------------------
    | Relations database
    |--------------------------------------------------------------------------
    |
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function imagentable()
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function users()
    {
        return $this->morphTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function lenders()
    {
        return $this->morphTo(Lender::class);
    }
}
