<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyModel;
use App\Models\UserModel;
use DB;

class Dashboard extends Controller
{
    public function dashboard()
    {
        $user_id = session('id');
        $user = UserModel::find($user_id);
        $property_count = PropertyModel::where('user_id', $user_id)->count();
        $tenant_count = DB::table('properties')
                            ->join('properties_tenant', 'properties.id', '=', 'properties_tenant.property_id')
                            ->where('properties.user_id', $user_id)
                            ->where('properties_tenant.status', 'renting')
                            ->count();
        $rental_request_count = DB::table('properties')
                            ->join('properties_tenant', 'properties.id', '=', 'properties_tenant.property_id')
                            ->where('properties.user_id', $user_id)
                            ->where('properties_tenant.status', 'pending')
                            ->count();
        $total_income = DB::table('properties')
                            ->select(DB::raw('sum(properties_tenant.pay_amount) as total_income'))
                            ->join('properties_tenant', 'properties.id', '=', 'properties_tenant.property_id')
                            ->where('properties.user_id', $user_id)
                            ->where('properties_tenant.status', 'renting')
                            ->get();
        
        return view('landlord.dashboard')->with(['property_count'=>$property_count, 'tenant_count'=>$tenant_count, 'rental_request_count'=>$rental_request_count, 'total_income'=>$total_income, 'user'=>$user]);
    }
}
