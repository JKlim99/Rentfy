<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\InvoiceModel;
use App\Models\PropertyTenantModel;
use DB;
use Carbon\Carbon;

class Rental extends Controller
{
    public function rentalList()
    {
        $user_id = session('id');
        $user = UserModel::find($user_id);

        $rentals = DB::table('properties')
                            ->select(['properties_tenant.*', 'properties.name', 'users.first_name', 'users.last_name'])
                            ->join('properties_tenant', 'properties.id', '=', 'properties_tenant.property_id')
                            ->join('users', 'users.id', '=', 'properties_tenant.user_id')
                            ->where('properties.user_id', $user_id)
                            ->get();

        return view('landlord.rental.list')->with(['user'=>$user, 'rentals'=>$rentals]);
    }

    public function rentalDetails($id)
    {
        $user_id = session('id');
        $user = UserModel::find($user_id);

        $rental = DB::table('properties')
                            ->select(['properties_tenant.*', 'properties.name', 'users.first_name', 'users.last_name'])
                            ->join('properties_tenant', 'properties.id', '=', 'properties_tenant.property_id')
                            ->join('users', 'users.id', '=', 'properties_tenant.user_id')
                            ->where('properties_tenant.id', $id)
                            ->first();

        $invoices = InvoiceModel::where('rental_id', $id)->get();

        return view('landlord.rental.details')->with(['user'=>$user, 'rental'=>$rental, 'invoices'=>$invoices]);
    }

    public function acceptRental(Request $request, $id)
    {
        $date = $request->input('started_at');
        PropertyTenantModel::where('id', $id)->update(['status'=>'renting', 'started_at'=>$date]);
        $rental = PropertyTenantModel::find($id);
        InvoiceModel::create([
            'property_id' => $rental->property_id,
            'user_id' => $rental->user_id,
            'amount' => $rental->pay_amount,
            'type' => 'rental',
            'next_payment_date' => Carbon::createFromFormat('Y-m-d', $rental->started_at)->addMonth(),
            'payment_date' => null,
            'rental_id' => $id
        ]);
        return redirect('/rental');
    }

    public function rejectRental($id)
    {
        $rental = PropertyTenantModel::where('id', $id)->update(['status'=>'rejected']);
        return redirect('/rental');
    }

    public function terminateRental($id)
    {
        PropertyTenantModel::where('id', $id)->update([
            'status' => 'terminated'
        ]);
        return redirect('/rental');
    }
}
