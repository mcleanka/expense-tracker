<?php

use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\LoanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource(IncomeController::class)->names('income');
Route::resource(ExpenseController::class)->names('expense');
Route::resource(LoanController::class)->names('loan');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});