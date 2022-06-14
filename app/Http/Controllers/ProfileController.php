<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ViewModel\Response;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    private $response;
    public function __construct()
    {
        $this->response = new Response();
    }

    public function index() {
        $user = User::find(Auth::user()->id);
        return view('layouts.template.pages.profile.index', compact('user'));
    }

    public function update($id, Request $request) {
        try {
            $user = User::find(Auth::user()->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
    
            return redirect('/profile')->with('success', "Profile updated Successfuly!");
        } catch (Exception $ex) {
            return redirect('/profile')->with('error', "Something went wrong"); 
        }
    }

    public function check_password(Request $request) {
        $user = User::find(Auth::user()->id);
        if (Hash::check($request->old_password, $user->password)) {
            $this->response->response_code = 1;
            $this->response->message = "success";
            $this->response->data = true;
            return response()->json($this->response);
        }
        $this->response->response_code = 0;
        $this->response->message = "error";
        $this->response->data = false;
        return response()->json($this->response);
    }

    public function change_password(Request $request) {
        $user = User::find(Auth::user()->id);
        $user->password = bcrypt($request->new_password);
        $user->save();
        
        $this->response->response_code = 1;
        $this->response->message = "success";
        $this->response->data = true;

        return response()->json($this->response);
    }
}
