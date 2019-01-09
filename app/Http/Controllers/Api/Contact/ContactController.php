<?php

namespace App\Http\Controllers\Api\Contact;

use App\Address;
use App\Contact;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class ContactController extends ApiController
{
    /**
     * ContactController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show', 'update', 'store', 'destroy']);
        $this->middleware('client.credentials')->only(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $contact = Contact::all();
       

        return $this->showAll($contact,Contact::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $rules = ['name'            => 'required',
                  'email'           => 'required|email|unique:contacts', ];
        $this->validate($request, $rules);

        $contact = Contact::create($request->all());

        if ($request->has('address')) {
            //el contacto tiene direccion
            $address = Address::create($request->all());
            $contact->address()->associate($address)->save();
        }

        return $this->successResponse(['data'=>$contact, 'message'=>'Contact Created'], 201);
    }

    /**
     * @param \App\Contact $contact
     *
     * @return mixed
     */
    public function show(contact $contact)
    {
        return $this->showOne($contact);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Contact             $contact
     *
     * @return mixed
     */
    public function update(Request $request, contact $contact)
    {
        $rules = ['name'  => 'required',
                  'email' => 'required|email|unique:contacts,email,'.$request->id, ];
        $this->validate($request, $rules);

        $contact->fill($request->all());
        if ($contact->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $contact->save();

        return $this->successResponse(['data' => $contact, 'message' => 'Contact updated']);
    }

    /**
     * @param \App\Contact $contact
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Exception
     */
    public function destroy(contact $contact)
    {
        $contact->delete();

        return $this->successResponse(['data' => $contact, 'message' => 'Contact deleted']);
    }

    public function checkemail(Request $request)
    {
        $rules = ['email' => 'required|email'];
        $this->validate($request, $rules);

        $contact = Contact::where('email', $request->email)->get()->first();

        if ($contact) {
            return $this->errorResponse(['data'             => $contact,
                                                  'message' => 'Email already taken', ], 422);
        }

        return $this->successResponse(['data' => $request->all(), 'message' => 'Email success']);
    }
}
