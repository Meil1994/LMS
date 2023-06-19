<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class SigninController extends Controller
{
    public function signin(){
        return view('signin.Signin');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You have been logged out!');
    }

    public function authenticate(Request $request){
        $formFields = $request->validate([
            'username' => ['required', 'alpha_dash'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You have been logged in!');
        }
        return back()->withErrors(['username'=> 'Invalid Credentials'])->onlyInput('username');
    }

    public function emailSignin(){
        return view('signin.EmailSignin');
    }

    public function emailAuthenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You have been logged in!');
        }
        return back()->withErrors(['username'=> 'Invalid Credentials'])->onlyInput('username');
    }
}
