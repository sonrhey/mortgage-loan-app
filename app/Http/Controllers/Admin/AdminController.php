<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BaseLoanCalculator;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function index() {
    $transactions = BaseLoanCalculator::with('loan_type', 'user', 'loan_ammortization')->get();
    return view('admin.layouts.pages.dashboard', compact('transactions'));
  }
}
