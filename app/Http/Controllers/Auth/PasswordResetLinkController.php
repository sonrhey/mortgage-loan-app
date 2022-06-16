<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Mail;

class PasswordResetLinkController extends Controller
{
  /**
   * Display the password reset link request view.
   *
   * @return \Illuminate\View\View
   */
  public function create()
  {
    return view('auth.template-auths.forgot-password');
  }

  /**
   * Handle an incoming password reset link request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\RedirectResponse
   *
   * @throws \Illuminate\Validation\ValidationException
   */
  public function store(Request $request)
  {
    $request->validate([
      'email' => 'required|email|exists:users',
    ]);

    $token = Str::random(64);

    DB::table('password_resets')->insert([
        'email' => $request->email, 
        'token' => $token, 
        'created_at' => Carbon::now()
      ]);

    Mail::send('auth.email-template.index', ['token' => $token], function($message) use($request){
        $message->to($request->email);
        $message->from('mortgagesystems@herokuapp.com','Mortgage Team');
        $message->subject('Reset Password');
    });

    return back()->with('message', 'We have e-mailed your password reset link!');
  }
}
