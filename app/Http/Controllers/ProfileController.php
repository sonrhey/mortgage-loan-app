<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
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
}
