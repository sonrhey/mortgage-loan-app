<?php

namespace App\Http\Controllers;

use App\Models\LoanTypeCalculator;
use Illuminate\Http\Request;
use Mail;

class DashboardController extends Controller
{
    public function index() {
        $loan_types = LoanTypeCalculator::all();
        return view('layouts.template.pages.dashboard', compact('loan_types'));
    }

    public function sendEmail(){
        $data = [];
        $config = [];
        Mail::send('email-template', compact('data', 'config'), function($message) {
           $message->to("sonrheydeiparine2@gmail.com", 'BOASS Message')->subject
              ("Test Email");
           $message->from('boass@herokuapp.com','BOASS Team');
        });
        return "HTML Email Sent. Check your inbox.";
    }
}
