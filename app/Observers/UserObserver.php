<?php
/**
 * Created by PhpStorm.
 * User: mauriciosuarez
 * Date: 3/15/18
 * Time: 11:51 AM.
 */

namespace App\Observers;

use App\Contact;
use App\User;

class UserObserver
{
    public function creating(User $user)
    {
        if (!$user->password) {
            $user->password = bcrypt(str_random(10));
        } else {
            $user->password = bcrypt($user->password);
        }
    }

    public function created(User $user)
    {
        $user->createToken($user->email)->accessToken;

        if (0 == count($user->roles)) {
            $user->syncRoles('admin');
        }

        if (auth()->user()) {
            $user->activities()->create(['description'                => '<p>User Created</p>',
                                                        'user_id'     => auth()->id(), ]);
        }
    }

    public function updated(User $user)
    {
        Contact::find($user->contact_id)->update($user->toArray());
    }

    public function deleted(User $user)
    {
        $user->contact()->delete();
        $user->activities()->delete();
        $user->applications()->each(function ($item) {
            $item->processor()->dissociate()->save();
        });

        $user->leads()->each(function ($item) {
            $item->executive()->dissociate()->save();
        });

        $user->image()->delete();
        $user->read()->delete();
        $user->emails()->delete();
    }
}
