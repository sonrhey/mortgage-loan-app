<?php

namespace App\Http\Controllers;

use App\Models\BaseLoanCalculator;
use App\Models\LoanAmmortization;
use App\Models\LoanAmmortizationDetails;
use App\Models\ViewModel\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LoanAmmortizationCalculatorController extends Controller
{
    private $response;
    public function __construct()
    {
        $this->response = new Response();
    }

    public function index() {
        return view('layouts.template.pages.tools.loan-ammortization-calculator.index');
    }
    
    public function store(Request $request) {
        try {
            DB::beginTransaction();
            $base_loan = new BaseLoanCalculator();
            $base_loan->save();

            $loan_ammortization = new LoanAmmortization($request->form);
            $loan_ammortization->slug = Str::slug($request->form["title"], "-");
            $loan_ammortization->base_loan_calculator_id = $base_loan->id;
            $loan_ammortization->save();

            $monthly_payments = $request->monthlyPaments;
            $payments = [];

            foreach ($monthly_payments as $monthly_payment) {
                $payment = (object) $monthly_payment;
                array_push($payments, [
                    "month" => $payment->month,
                    "payment" => $payment->payment,
                    "principal" => $payment->principal,
                    "interest" => $payment->interest,
                    "balance" => $payment->balance,
                    "loan_ammortization_id" => $loan_ammortization->id
                ]);
            }

            $loan_ammortization_details = LoanAmmortizationDetails::insert($payments);

            $this->response->response_code = 1;
            $this->response->message = "You have successfully saved your calculation.";
            $this->response->data = $loan_ammortization_details;
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
            $this->response->response_code = 0;
            $this->response->message = "error";
            $this->response->data = $ex;
        }

        return response()->json($this->response);
    }
    //
}
