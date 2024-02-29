<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index () {
        return view('auth.login');
    }

    public function login (Request $request) {
        $credentials = $request -> only('email', 'password');

        if(Auth::attempt($credentials)) {
            return redirect() -> intended('/dashboard');
        } else {
            return back() -> withInput() -> withErrors(['email' => 'Invalid credentials']);
        }        
    }

    public function signout () {
        Auth::logout();
        return redirect('/dashboard/login');
    }
}
