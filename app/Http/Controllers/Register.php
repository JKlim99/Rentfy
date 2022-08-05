<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class Register extends Controller
{
    public function registerPage()
    {
        return view('tenant.register');
    }

    public function register(Request $request)
    {
        $user_type = $request->input('user_type', null);
        if(!$user_type)
        {
            return redirect()->back()->withErrors(['message' => 'Please select your user type.'])->withInput($request->all());
        }
        $email = $request->input('email', null);
        $email_existed = UserModel::where('email', $email)->first();
        if($email_existed)
        {
            return redirect()->back()->withErrors(['message' => 'Email Address is registered.'])->withInput($request->all());
        }

        $password = $request->input('password', null);
        $confirm_password = $request->input('confirm_password', null);
        if($password != $confirm_password)
        {
            return redirect()->back()->withErrors(['message' => 'Password and confirm password mismatch.'])->withInput($request->all());
        }

        $inputs = $request->except(['confirm_password', '_token']);
        $user = UserModel::create($inputs);
        $user->update(['password'=>md5($password)]);
        $request->session()->put('id', $user->id);
        $request->session()->put('type', $user->user_type);
        return redirect('/');
    }
}
