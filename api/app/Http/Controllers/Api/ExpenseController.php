<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\ExpenseResource;
use App\Models\Api\Expense;
use Illuminate\Http\Request;
use Validator;

class ExpenseController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expense = Expense::all();

        return $this->sendResponse(ExpenseResource::collection($expense), 'Expenses retrieved successfully.');
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
            'income_id' => 'required',
            'name' => 'required',
            'owner' => 'required',
            'amount' => 'required',
            'date' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $expense = auth()->user()->expense()->create($input);

        return $this->sendResponse(new ExpenseResource($expense), 'Expense created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expense = Expense::with([
            "user",
        ])->findOrFail($id);

        if (is_null($expense)) {
            return $this->sendError('Expense not found.');
        }

        return $this->sendResponse(new ExpenseResource($expense), 'Expense retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Api\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'income_id' => 'required',
            'name' => 'required',
            'owner' => 'required',
            'amount' => 'required',
            'date' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        auth()->user()->expense()->update($request->all());

        return $this->sendResponse(new ExpenseResource($expense), 'Expense updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

        return $this->sendResponse([], 'Expense deleted successfully.');
    }
}
