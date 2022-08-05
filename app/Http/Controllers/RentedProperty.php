<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\PropertyTenantModel;
use DB;

class RentedProperty extends Controller
{
    public function rentedList()
    {
        $user_id = session('id');
        $user = UserModel::find($user_id);

        $rentals = DB::table('properties')
                            ->select(['properties.*', 'properties_tenant.*', 'properties_tenant.id as rental_id', 'users.first_name', 'users.last_name', 'users.id as owner_id'])
                            ->join('properties_tenant', 'properties.id', '=', 'properties_tenant.property_id')
                            ->join('users', 'users.id', '=', 'properties.user_id')
                            ->where('properties_tenant.user_id', $user_id)
                            ->get();

        return view('tenant.rented.list')->with(['user'=>$user, 'rentals'=>$rentals]);
    }

    public function cancelRentRequest($id)
    {
        PropertyTenantModel::where('id', $id)->update([
            'status' => 'cancelled'
        ]);
        return redirect('/rented');
    }

    public function terminateRent($id)
    {
        PropertyTenantModel::where('id', $id)->update([
            'status' => 'terminated'
        ]);
        return redirect('/rented');
    }
}
