<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\PropertyModel;

class Profile extends Controller
{
    public function profilePage($id)
    {
        $user_id = $id ?? null;
        if($user_id == null)
        {
            return abort(404, "Page not found");
        }
        $user = UserModel::find($user_id);
        if(!$user)
        {
            return abort(404, "Page not found");
        }

        $properties = PropertyModel::where('user_id', $user_id)->get();

        return view('tenant.profile')->with(['user' => $user, 'properties' => $properties]);
    }

    public function editProfilePage()
    {
        $user_id = session('id');
        $user = UserModel::find($user_id);
        return view('tenant.editprofile')->with('user', $user);
    }

    public function updateProfile(Request $request)
    {
        $user_id = session('id');

        $user_type = $request->input('user_type', null);
        if(!$user_type)
        {
            return redirect()->back()->withErrors(['message' => 'Please select your user type.'])->withInput($request->all());
        }

        $password = $request->input('password', null);
        $confirm_password = $request->input('confirm_password', null);
        if($password != $confirm_password)
        {
            return redirect()->back()->withErrors(['message' => 'Password and confirm password mismatch.'])->withInput($request->all());
        }

        $inputs = $request->except(['confirm_password', '_token']);
        $user = UserModel::where('id', $user_id)->update($inputs);
        return redirect('/profile/'.$user_id);
    }
}
