<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPassword;
use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use Auth;
use Session;
use App\Http\Requests\ForgotPassword;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use HttpOz\Roles\Models\Role;

class UserController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('login');
    }

    public function postLogin(LoginRequest $request)
    {
      
        $inputs = $request->all();
        $login = User::login($inputs);
        
        if ($login == false) {
            Session::flash("error", "Invalid Username/Password.");
            Session::flash("title", "Oops...");
            return redirect()->back();
        }

        Session::flash("success", "Login Successfully.");
        Session::flash("title", "Great");
        return redirect('/');
    }

    public function signup()
    {
        return view('signup');
    }

    public function postSignup(SignupRequest $request)
    {
        $inputs = $request->all();
        $signup = User::signup($inputs);
        $role = Role::Find($inputs['type']);
        $signup->attachRole($role); // you can pass whole object, or just an id
        if ($signup == false) {
            Session::flash("error", "Account created failed.");
            Session::flash("title", "Oops...");
            return redirect()->back();
        }
        User::signUpNotify($signup);
        Session::flash("success", "Account created successfully.");
        Session::flash("title", "Great");
        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function forgotPassword()
    {
        return view('forgot-password');
    }

    public function postForgotPassword(ForgotPassword $request)
    {
        $input = $request->all();

        $forgotPassword = User::forgotPasswordNotifi($input);

        if ($forgotPassword == false) {
            Session::flash("error", "Reset password failed.");
            Session::flash("title", "Oops...");
            return redirect()->back();
        }

        Session::flash("success", "Password reset link sent to your e-mail.");
        Session::flash("title", "Great");
        return redirect()->back();
    }

    public function resetPassword($token)
    {
        try {
            $user = User::find(decrypt($token));
            return view("reset-password", compact('user'));
        } catch (\Exception $exp) {
            Session::flash("error", "Invalid token.");
            Session::flash("title", "Oops...");
            return redirect('/');
        }
    }

    public function postResetPassword(ResetPassword $request)
    {
        $inputs = $request->all();

        $resetPassword = User::resetPassword($inputs);

        if ($resetPassword == false) {
            Session::flash("error", "Reset password failed.");
            Session::flash("title", "Oops...");
            return redirect()->back();
        }

        Session::flash("success", "Password reset successfully.");
        Session::flash("title", "Great");
        return redirect('/login');
    }

    public function confirmEmail($token)
    {
        try {
            $user = User::find(decrypt($token));
            if ($user->exists AND $user->active == 1) {
                Session::flash("error", "Email already confirmed.");
                Session::flash("title", "Confirm email");
                return redirect('/');
            } else {
                $user->activateAccount();
                Session::flash("success", "Email confirmed successfully.");
                Session::flash("title", "Confirm email");
                return redirect('/login');
            }
        } catch (\Exception $exp) {
            Session::flash("error", "Invalid token.");
            Session::flash("title", "Oops...");
            return redirect('/');
        }
    }
    
}
