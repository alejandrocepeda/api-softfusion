<?php
/**
 * Created by PhpStorm.
 * User: mauriciosuarez
 * Date: 3/15/18
 * Time: 11:51 AM.
 */

namespace App\Observers;

use App\Business;

class BusinessObserver
{
    public function created(Business $business)
    {
        if (auth()->user()) {
            $business->activities()->create(['description'                => '<p>Business Created</p>',
                                                            'user_id'     => auth()->id(), ]);
        }
    }

    public function deleted(Business $business)
    {
        $business->address()->delete();

        $business->contacts()->each(function ($item) {
            $item->business()->dissociate()->save();
        });

        $business->applications()->each(function ($item) {
            $item->business()->dissociate()->save();
        });

        $business->activities()->delete();
        $business->image()->delete();
    }
}
