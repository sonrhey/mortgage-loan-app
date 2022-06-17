<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\User;
use Carbon\Carbon;
use Exception;
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
    try {
      $request->validate([
        'email' => 'required|email|exists:users',
      ]);

      $token = Str::random(64);

      $password_reset = new PasswordReset();
      $password_reset->email = $request->email;
      $password_reset->token = $token;
      $password_reset->save();

      Mail::send('auth.email-template.index', ['token' => $token], function($message) use($request){
        $message->to($request->email);
        $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        $message->subject('Reset Password');
      });

      return back()->with('message', 'We have e-mailed your password reset link!');
    } catch (Exception $ex) {
      return back()->with('error', $ex->getMessage());
    }
  }
}
