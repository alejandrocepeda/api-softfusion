<?php
/**
 * Created by PhpStorm.
 * User: mauriciosuarez
 * Date: 3/15/18
 * Time: 11:51 AM.
 */

namespace App\Observers;

use App\Application;

class ApplicationObserver
{
    public function created(Application $application)
    {
        if (auth()->user()) {
            $application->activities()->create(['description'                => '<p>Application Created</p>',
                                                               'user_id'     => auth()->id(), ]);
        }
    }

    public function deleted(Application $application)
    {
        $application->activities()->delete();
        $application->approvals()->delete();
        $application->documents()->delete();
        $application->lead()->dissociate();
        $application->read()->delete();
        $application->signatures()->delete();
    }
}
