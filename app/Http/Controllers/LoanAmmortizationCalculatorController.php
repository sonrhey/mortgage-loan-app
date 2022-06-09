<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanAmmortizationCalculatorController extends Controller
{
    public function index() {
        return view('layouts.template.pages.tools.loan-ammortization-calculator.index');
    }
    //
}
