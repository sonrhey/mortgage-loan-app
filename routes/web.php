<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoanTypeCalculatorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LoanAmmortizationCalculatorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});
Route::get('test-email', [DashboardController::class, 'sendEmail']);

Route::group(['middleware' => ['auth']], function(){
    Route::group(['middleware' => ['user']], function() {
      Route::resource('dashboard', DashboardController::class);
      Route::resource('history', HistoryController::class);
      Route::resource('loan-ammortization-calculator', LoanAmmortizationCalculatorController::class);
      Route::resource('profile', ProfileController::class);
      Route::get('loan-ammortization-calculator/{id}/{slug}', [LoanAmmortizationCalculatorController::class, 'index']);
      Route::get('history/{id}/{slug}', [HistoryController::class, 'calculation_view']);
    });

    Route::group(['middleware' => ['administrator']], function(){
      Route::resource('admin', AdminController::class);
      Route::resource('calculator-type', LoanTypeCalculatorController::class);
      Route::post('calculator-type/store', [LoanTypeCalculatorController::class, 'store']);
    });
});

require __DIR__.'/auth.php';
