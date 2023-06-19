<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SignupController extends Controller
{
    public function signup(){
        return view('signup.Signup');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'username' => ['required', 'alpha_dash', Rule::unique('users', 'username')],
            'firstname' => ['required', 'min:3'],
            'middlename' => ['required', 'min:3'],
            'lastname' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
            'birthday' => 'required',
            'phone_number' => ['required', Rule::unique('users', 'phone_number')],
            'gender' => 'required',
            'address' => 'required',
            'user_type' => 'required',
        ]);

        $formFields['password'] = bcrypt($formFields['password']);
        $user = User::create($formFields);
        auth()->login($user);
        return redirect('/')->with('message', 'User created and logged in!');
    }
}


