<?php

use App\Http\Controllers\Api\ExpenseController;
use App\Http\Controllers\Api\IncomeController;
use App\Http\Controllers\Api\LoanController;
use App\Http\Controllers\Api\RegisterController;
use Illuminate\Support\Facades\Route;

Route::controller(RegisterController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::resource("/income", IncomeController::class)
        ->except([
            "create",
            "edit",
        ])->names('income');

    Route::resource("/expense", ExpenseController::class)
        ->except([
            "create",
            "edit",
        ])->names('expense');

    Route::resource("/loan", LoanController::class)
        ->except([
            "create",
            "edit",
        ])->names('loan');
});