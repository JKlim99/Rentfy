<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class Login extends Controller
{
    public function loginPage()
    {
        return view('tenant.login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email', null);
        $password = $request->input('password', null);

        $user = UserModel::where('email', $email)->first();
        if(!$user)
        {
            return redirect()->back()->withErrors(['message' => 'User not found.'])->withInput($request->all());
        }

        if($user->password != $password)
        {
            return redirect()->back()->withErrors(['message' => 'Incorrect password.'])->withInput($request->all());
        }

        $request->session()->put('id', $user->id);
        $request->session()->put('type', 'tenant');
        return redirect('/');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
