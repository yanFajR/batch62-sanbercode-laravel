<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function register() {
        return view('register');
    }

    public function welcome(Request $request) {
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        return view('welcome', ['firstName' => $firstName, 'lastName' => $lastName]);
    }
}
