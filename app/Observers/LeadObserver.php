<?php
/**
 * Created by PhpStorm.
 * User: mauriciosuarez
 * Date: 3/15/18
 * Time: 11:51 AM.
 */

namespace App\Observers;

use App\Lead;

class LeadObserver
{
    public function created(Lead $lead)
    {
        if (auth()->user()) {
            $lead->activities()->create(['description'                => '<p>Lead Created</p>',
                                                        'user_id'     => auth()->id(), ]);
        }
    }

    public function deleted(Lead $lead)
    {
        $lead->contact()->delete();
        $lead->applications()->delete();
        $lead->activities()->delete();
        $lead->applications()->delete();
        $lead->read()->delete();
    }
}
