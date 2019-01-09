<?php

namespace App\Http\Controllers\Api\Contact;

use App\Contact;
use App\Http\Controllers\ApiController;
use App\User;

class ContactUserController extends ApiController
{
    /**
     * ContactUserController constructor.
     */
    public function __construct()
    {
        $this->middleware('client.credentials');
    }

    /**
     * @param Contact $contact
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(contact $contact)
    {
        //
        $contacts = $contact->user;

        return $this->showOne($contacts);
    }

    /**
     * @param \App\Contact $contact
     * @param \App\User    $user
     */
    public function update(Contact $contact, User $user)
    {
        $contact->user()->save($user);

        return $this->showOne($contact);
    }
}
