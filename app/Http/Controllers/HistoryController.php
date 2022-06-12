<?php

namespace App\Http\Controllers;

use App\Models\BaseLoanCalculator;
use App\Models\LoanAmmortization;
use App\Models\LoanAmmortizationDetails;
use App\Models\ViewModel\Response;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    private $response;
    public function __construct()
    {
        $this->response = new Response();
    }
    public function index() {
        return view('layouts.template.pages.history.index');
    }

    public function all_history() {
        $histories = BaseLoanCalculator::with('loan_type', 'loan_ammortization')->get();
        $this->response->response_code = 1;
        $this->response->message = "success";
        $this->response->data = $histories;

        return response()->json($this->response);
    }

    public function destroy(Request $request) {
        $history = BaseLoanCalculator::find($request->id);
        $history->delete();

        $this->response->response_code = 1;
        $this->response->message = "deleted";
        $this->response->data = "Calculation Deleted Successfully!";

        return response()->json($this->response);
    }

    public function delete_all() {
        $base_loan = BaseLoanCalculator::truncate();
        $loan_ammortization = LoanAmmortization::truncate();
        $loan_ammortization_details = LoanAmmortizationDetails::truncate();

        $this->response->response_code = 1;
        $this->response->message = "deleted";
        $this->response->data = "Calculation Deleted Successfully!";

        return response()->json($this->response);
    }
}
