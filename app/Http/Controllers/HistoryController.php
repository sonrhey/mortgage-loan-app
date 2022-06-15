<?php

namespace App\Http\Controllers;

use App\Models\BaseLoanCalculator;
use App\Models\LoanAmmortization;
use App\Models\LoanAmmortizationDetails;
use App\Models\ViewModel\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $histories = BaseLoanCalculator::with('loan_type', 'loan_ammortization')
        ->myhistory()
        ->get();

        $this->response->response_code = 1;
        $this->response->message = "success";
        $this->response->data = $histories;

        return response()->json($this->response);
    }

    public function destroy(Request $request) {
        $history = BaseLoanCalculator::find($request->id)->delete();

        $this->response->response_code = 1;
        $this->response->message = "deleted";
        $this->response->data = "Calculation Deleted Successfully!";

        return response()->json($this->response);
    }

    public function delete_all() {
        $base_loan = BaseLoanCalculator::myhistory()->delete();

        $this->response->response_code = 1;
        $this->response->message = "deleted";
        $this->response->data = "Calculation Deleted Successfully!";

        return response()->json($this->response);
    }

    public function calculation_view($id, $slug) {
        $loan_ammortization = LoanAmmortization::find($id);
        $loan_ammortization_details = LoanAmmortizationDetails::where('loan_ammortization_id', $id)->paginate(10);
        return view('layouts.template.pages.history.history-view-selected', compact('loan_ammortization', 'loan_ammortization_details'));
    }
}
