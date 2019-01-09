<?php

namespace App\Http\Controllers\Api\User;

use App\Address;
use App\Contact;
use App\Http\Controllers\ApiController;
use App\User;
use Illuminate\Http\Request;

class userController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('client.credentials');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $user = $this->permission(User::all(), 'id');

        return $this->showAll($user,User::class);
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
        $rules = ['name'   => 'required',
                  'email'  => 'required|email|unique:users',
                  'image'  => 'image',
                  'status' => 'boolean', ];

        $this->validate($request, $rules);

        $user = User::create($request->all());

        //Si tiene imagen se optimiza y se guarda
        User::fillImage($request, $user);

        if ($request->has('email')) {
            $user->syncRoles($request->role);
            //creamos el contacto
            $contact = Contact::create($request->all());
            $user->contact()->associate($contact)->save();

            if ($request->has('address')) {
                //el contacto tiene direccion
                $address = Address::create($request->all());
                $contact->address()->associate($address)->save();
            }
        }

        return $this->successResponse(['data'=>$user, 'message'=>'User Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        return $this->showOne($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User                $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, User $user)
    {
        //Si tiene imagen se optimiza y se actualiza
        User::fillImage($request, $user);

        $user->fill($request->all());

        $user->save();

        return $this->successResponse(['data' => $user, 'message' => 'User updated']);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $user
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        return $this->successResponse(['data' => $user, 'message' => 'User deleted']);
    }
}
