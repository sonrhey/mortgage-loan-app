<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoanTypeCalculator;
use Exception;
use Illuminate\Http\Request;

class LoanTypeCalculatorController extends Controller
{
  public function index() {
    $loan_type_calculators = LoanTypeCalculator::all();
    return view('admin.layouts.pages.calculator-types.index', compact('loan_type_calculators'));
  }

  public function store(Request $request) {
    try {
      $loan_calculator_type = new LoanTypeCalculator($request->all());
      $loan_calculator_type->save();
      return back()->with('message', 'Calculator Type Saved Successfully!');
    } catch (Exception $ex) {
      return back()->with('error', 'Something went wrong.');
    }
  }
}
