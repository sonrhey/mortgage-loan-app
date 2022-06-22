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

  public function destroy($id) {
    $loan_calculator_type = LoanTypeCalculator::find($id)->delete();
    return back()->with('success', 'Calculator Type Deleted successfuly!');
  }

  public function update(Request $request, $id) {
    $loan_calculator_type = LoanTypeCalculator::find($id);
    $loan_calculator_type->base_url = $request->base_url;
    $loan_calculator_type->slug = $request->slug;
    $loan_calculator_type->is_enabled = $request->is_enabled;
    $loan_calculator_type->class_name = $request->class_name;
    $loan_calculator_type->description = $request->description;
    $loan_calculator_type->save();
    return back()->with('message', 'Calculator Type Updated Successfully!');
  }
}
