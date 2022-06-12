<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LoanAmmortizationCalculatorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthenticatedSessionController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
  Route::post('/loan-ammortization-calculator/store', [LoanAmmortizationCalculatorController::class, 'store']);
  Route::get('/history/all-history', [HistoryController::class, 'all_history']);
  Route::delete('/history/destroy', [HistoryController::class, 'destroy']);
  Route::delete('/history/delete-all', [HistoryController::class, 'delete_all']);
});
