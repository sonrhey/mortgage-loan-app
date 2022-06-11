<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\ViewModel\Response;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    private $response;

    public function __construct()
    {
        $this->response = new Response();
    }
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.template-auths.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function login(LoginRequest $request){
        $auth = $request->authenticate();
        if(Auth::check()){
            $user = Auth::user();
            $token = $user->createToken("token");

            $this->response->response_code = 1;
            $this->response->message = 'success';
            $this->response->data = [
                "token" => $token->plainTextToken
            ];

            return response()->json($this->response);
        }else{
            $this->response->response_code = 0;
            $this->response->message = 'Error, Incorrect user or password.';
            return response()->json($this->response);
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
