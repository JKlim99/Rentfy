<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Property extends Controller
{
    public function search()
    {
        return view('tenant.property.list');
    }

    public function details()
    {

    }
}
