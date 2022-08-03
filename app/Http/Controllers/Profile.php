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
}
