<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\LoanResource;
use App\Models\Api\Loan;
use Illuminate\Http\Request;
use Validator;

class LoanController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->sendResponse(LoanResource::collection(Loan::all()), 'Loans retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'income_id' => 'required|integer',
            'payback_date' => 'required|date',
            'payback_interest' => 'required|between:0,99.99',
            'paid' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $loan = auth()->user()->loan()->create($input);

        return $this->sendResponse(new LoanResource($loan), 'Loan created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loan = Loan::with([
            "user",
        ])->findOrFail($id);

        if (is_null($loan)) {
            return $this->sendError('Loan not found.');
        }

        return $this->sendResponse(new LoanResource($loan), 'Loan retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Api\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loan $loan)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'income_id' => 'required|integer',
            'payback_date' => 'required|date',
            'payback_interest' => 'required|between:0,99.99',
            'paid' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        auth()->user()->loan()->update($request->all());

        return $this->sendResponse(new LoanResource($loan), 'Loan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        $loan->delete();

        return $this->sendResponse([], 'Loan deleted successfully.');
    }
}