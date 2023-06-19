<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\ForgotPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    public function forgotPassword()
    {
        return view('forgotpassword.ForgotPassword');
    }

    public function resetPassword(Request $request)
    {
        $user = User::getEmailSingle($request->email); 

        if (!empty($user)) {
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgotPassword($user));
            return redirect()->back()->with('message', "Please check your email for password reset.");
        } else {
            return redirect()->back()->with('error', "Email not found.");
        }
    }

    public function updatePassword($remember_token)
    {
        $user = User::getTokenSingle($remember_token); 
        if (!empty($user)) {
            $data['user'] = $user;
            $data['token'] = $remember_token; 
            return view('forgotpassword.UpdatePassword', $data);
        } else {
            abort(404);
        }
    }

    public function postReset($token, Request $request)
    {
        if ($request->password == $request->password_confirmation) {
            $user = User::getTokenSingle($token);
            if (!empty($user)) {
                $user->password = bcrypt($request->password);
                $user->remember_token = Str::random(30);
                $user->save();

                return redirect('/signin')->with('message', 'Password updated successfully!');
            } else {
                abort(404);
            }
        } else {
            return redirect()->back()->with('error', "Please check the password again.");
        }
    }
    
}
