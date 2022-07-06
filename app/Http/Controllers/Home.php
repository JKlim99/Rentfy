<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class Home extends Controller
{
    public function home()
    {
        return view('tenant.home');
    }
}
