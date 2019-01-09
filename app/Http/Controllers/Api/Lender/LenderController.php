<?php

namespace App\Http\Controllers\Api\Lender;

use App\Address;
use App\Contact;
use App\Http\Controllers\ApiController;
use App\Lender;
use App\User;
use Illuminate\Http\Request;

/**
 * Class LenderController.
 *
 * @property array|mixed relations
 */
class LenderController extends ApiController
{
    /**
     * LenderController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show', 'update', 'store', 'destroy']);
        $this->middleware('client.credentials')->only(['index', 'show']);
        //$this->relations = Lender::$relationships;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $lenders = Lender::all();

        return $this->showAll($lenders, Lender::class);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Lender $lender
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Lender $lender)
    {
        return $this->showOne($lender);
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
        $rules = ['name'                    => 'required',
                  'image'                   => 'image',
                  'email'                   => 'email',
                  'min_loan_size'           => 'nullable|integer',
                  'max_loan_size'           => 'nullable|integer',
                  'min_terms'               => 'nullable|integer',
                  'max_terms'               => 'nullable|integer',
                  'max_loan_position'       => 'nullable|integer',
                  'max_ltv'                 => 'nullable|integer',
                  'min_credit_score_id'     => 'nullable|integer',
                  'years_in_business_id'    => 'nullable|integer',
                  'annual_revenue_id'       => 'nullable|integer',
                  'negative_days'           => 'nullable|integer',
                  'consolidation_refinance' => 'boolean',
                  'weekly_payments'         => 'boolean',
                  'puerto_rico'             => 'boolean',
                  'favorite'                => 'boolean', ];

        $this->validate($request, $rules);
        $lender = Lender::create($request->all());

        //Si tiene imagen se optimiza y se guarda
        Lender::fillImage($request, $lender);

        if ($request->has('email')) {
            //creamos el contacto
            $user = User::create($request->all());
            $user->syncRoles($request->role);
            $contact = Contact::create($request->all());
            $lender->contact()->associate($contact)->save();
            $user->contact()->associate($contact)->save();

            if ($request->has('address')) {
                //el contacto tiene direccion
                $address = Address::create($request->all());
                $contact->address()->associate($address)->save();
            }
        }

        return $this->successResponse(['data'=>$lender, 'message'=>'Lender Created'], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Lender              $lender
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Lender $lender)
    {
        //Si tiene imagen se optimiza y se guarda
        Lender::fillImage($request, $lender);

        $lender->fill($request->all());

        $lender->save();

        return $this->successResponse(['data'=>$lender, 'message'=>'Lender updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Lender $lender
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Lender $lender)
    {
        $lender->delete();

        return $this->successResponse(['data' => $lender, 'message' => 'Lender deleted']);
    }

    public function checkemail(Request $request)
    {
        $rules = ['email' => 'required|email'];
        $this->validate($request, $rules);

        //$contact = Contact::where('email', $request->email)->get()->first();
        $lender = Lender::where('email', $request->email)->get()->first();

        if ($lender) {
            return $this->errorResponse(['data'             => $lender,
                                                  'message' => 'Email already taken', ], 422);
        }

        return $this->successResponse(['data' => $request->all(), 'message' => 'Email success']);
    }
}
