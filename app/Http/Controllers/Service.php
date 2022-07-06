<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Service extends Controller
{
    public function serviceSelect()
    {
        return view('tenant.service_ordering.service_ordering1');
    }

    public function serviceProviderSelect()
    {
        return view('tenant.service_ordering.service_ordering2');
    }

    public function servicePropertySelect()
    {
        return view('tenant.service_ordering.service_ordering3');
    }

    public function serviceServiceSelect()
    {
        return view('tenant.service_ordering.service_ordering4');
    }

    public function serviceForm()
    {
        return view('tenant.service_ordering.service_ordering5');
    }

    public function serviceSubmit()
    {
        return view('tenant.home');
    }
}
