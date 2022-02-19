<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\IncomeResource;
use App\Models\Api\Income;
use Illuminate\Http\Request;
use Validator;

class IncomeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $income = Income::all();

        return $this->sendResponse(IncomeResource::collection($income), 'Income retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Income::create($request->all());

        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $income = Income::create($input);
        return $this->sendResponse(new IncomeResource($income), 'Income created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        $income = Income::find($id);

        if (is_null($income)) {
            return $this->sendError('Income not found.');
        }

        return $this->sendResponse(new IncomeResource($income), 'Income retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Api\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $income->name = $input['name'];
        $income->detail = $input['detail'];
        $income->save();

        return $this->sendResponse(new IncomeResource($income), 'Income updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        $income->delete();

        return $this->sendResponse([], 'Income deleted successfully.');
    }
}