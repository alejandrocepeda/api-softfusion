<?php

namespace App\Http\Controllers\Api\Underwriting;

use App\Http\Controllers\ApiController;
use App\Http\Resources\UnderwritingResource;
use App\Underwriting;
use Illuminate\Http\Request;

class underwritingController extends ApiController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $underwritings = Underwriting::all();

        return $this->showAll($underwritings,Underwriting::class);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $rules = ['bank_id'           => 'required|integer',
                  'application_id'    => 'required|integer',
                  'last_four_digits'  => 'required|integer|min:4',
                  'total_deposits'    => 'required|integer',
                  'number_deposits'   => 'required|integer',
                  'ending_balance'    => 'required|integer',
                  'avg_daily_balance' => 'required|integer',
                  'month'             => 'date', ];

        $this->validate($request, $rules);
        $data = Underwriting::create($request->all());

        return $this->successResponse(['data' => new UnderwritingResource($data), 'message' => 'Underwriting Created']);
    }

    /**
     * @param Underwriting $underwriting
     */
    public function show(Underwriting $underwriting)
    {
        $this->showOne($underwriting);
    }

    /**
     * @param Request      $request
     * @param Underwriting $underwriting
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Underwriting $underwriting)
    {
        $rules = ['bank_id'           => 'required|integer',
                  'application_id'    => 'required|integer',
                  'last_four_digits'  => 'required|integer|min:4',
                  'total_deposits'    => 'required|integer',
                  'number_deposits'   => 'required|integer',
                  'ending_balance'    => 'required|integer',
                  'avg_daily_balance' => 'required|integer',
                  'month'             => 'date', ];

        $this->validate($request, $rules);

        $underwriting->fill($request->all());

        if ($underwriting->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $underwriting->save();

        return $this->successResponse(['data'    => new UnderwritingResource($underwriting),
                                       'message' => 'Underwriting Updated', ]);
    }

    /**
     * @param Underwriting $underwriting
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Exception
     */
    public function destroy(Underwriting $underwriting)
    {
        $underwriting->delete();

        return $this->successResponse(['data' => $underwriting, 'message' => 'Underwriting deleted']);
    }
}
