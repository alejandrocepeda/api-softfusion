<?php
/**
 * Created by PhpStorm.
 * User: mauriciosuarez
 * Date: 3/15/18
 * Time: 11:51 AM.
 */

namespace App\Observers;

use App\Contact;

class ContactObserver
{
    public function created(Contact $contact)
    {
        if (auth()->user()) {
            $contact->activities()->create(['description'                => '<p>Contact Created</p>',
                                                           'user_id'     => auth()->id(), ]);
        }
    }

    public function deleted(Contact $contact)
    {
        $contact->user()->delete();
        $contact->activities()->delete();
        $contact->address()->delete();
        $contact->leads()->delete();
        $contact->lenders()->each(function ($item) {
            $item->contact()->dissociate();
        });

        $contact->business()->dissociate();

        $contact->signatures()->delete();
        $contact->image()->delete();
    }
}
