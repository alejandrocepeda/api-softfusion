<?php
/**
 * Created by PhpStorm.
 * User: mauriciosuarez
 * Date: 6/8/18
 * Time: 3:02 PM.
 */

namespace App\Traits;

use Carbon\Carbon;

trait TransformDates
{
    public function getCreatedAtAttribute($value)
    {
        return $this->format($value);
    }

    public function getUpdatedAtAttribute($value)
    {
        return $this->format($value);
    }

    public function getDeletedAtAttribute($value)
    {
        return $this->format($value);
    }

    public function getBirthdateAtAttribute($value)
    {
        return $this->format($value);
    }

    public function getMonthAttribute($value)
    {
        return $this->format($value);
    }

    public function getFundedAtAttribute($value)
    {
        return $this->format($value);
    }

    public function getRememberAtAttribute($value)
    {
        return $this->format($value);
    }

    public function getFinishAtAttribute($value)
    {
        return $this->format($value);
    }

    private function format($value)
    {
        //if($value) return (string)Carbon::parse($value)->format('m-d-Y h:i:s a');
        if ($value) {
            return (string) $value;
        }

        return $value;
    }
}
