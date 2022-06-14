<?php

namespace App\Http\Controllers;

use App\Models\LoanTypeCalculator;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $loan_types = LoanTypeCalculator::all();
        return view('layouts.template.pages.dashboard', compact('loan_types'));
    }
}
