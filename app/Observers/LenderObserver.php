<?php
/**
 * Created by PhpStorm.
 * User: mauriciosuarez
 * Date: 3/15/18
 * Time: 11:51 AM.
 */

namespace App\Observers;

use App\Lender;

class LenderObserver
{
    public function created(Lender $lender)
    {
        if (auth()->user()) {
            $lender->activities()->create(['description'                => '<p>Lender Created</p>',
                                                          'user_id'     => auth()->id(), ]);
        }
    }
}
