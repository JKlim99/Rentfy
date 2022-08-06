<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceProviderModel;
use App\Models\ServiceModel;
use App\Models\PropertyModel;
use App\Models\UserModel;
use App\Models\OrderModel;
use DB;

class Service extends Controller
{
    public function serviceSelect()
    {
        return view('tenant.service_ordering.service_ordering1');
    }

    public function serviceProviderSelect()
    {
        $providers = ServiceProviderModel::get();
        return view('tenant.service_ordering.service_ordering2')->with(['providers'=>$providers]);
    }

    public function servicePropertySelect()
    {
        $user_id = session('id');
        $properties = DB::table('properties')
                            ->select(['properties_tenant.*', 'properties.*', 'properties_tenant.id as rental_id', 'users.first_name', 'users.last_name', 'users.id as owner_id'])
                            ->join('properties_tenant', 'properties.id', '=', 'properties_tenant.property_id')
                            ->join('users', 'users.id', '=', 'properties.user_id')
                            ->where('properties_tenant.user_id', $user_id)
                            ->where('properties_tenant.status', 'renting')
                            ->get();
        return view('tenant.service_ordering.service_ordering3')->with(['properties'=>$properties]);
    }

    public function serviceServiceSelect()
    {
        $services = ServiceModel::get();
        return view('tenant.service_ordering.service_ordering4')->with(['services'=>$services]);
    }

    public function serviceForm()
    {
        return view('tenant.service_ordering.service_ordering5');
    }

    public function serviceSubmit(Request $request)
    {
        $type = $request->input('type');
        $provider = $request->input('provider');
        $property = $request->input('property');
        $service = $request->input('service');
        $date = $request->input('date');
        $time = $request->input('time');

        $property_info = PropertyModel::find($property);
        $provider_info = ServiceProviderModel::find($provider);
        $service_info = ServiceModel::find($service);
        $user_info = UserModel::find(session('id'));

        $order = OrderModel::create([
            'service_id' => $service,
            'provider_id' => $provider,
            'user_id' => $user_info->id,
            'address1' => $property_info->address1,
            'address2' => $property_info->address2,
            'city' => $property_info->city,
            'state' => $property_info->state,
            'postcode' => $property_info->postcode,
            'country' => $property_info->country,
            'type' => $type,
            'service_date' => $date,
            'service_time' => $time,
            'service_type' => $service_info->service_name,
            'service_provider' => $provider_info->name,
            'user_first_name' => $user_info->first_name,
            'user_last_name' => $user_info->last_name,
            'user_phone_number' => $user_info->phone_number,
            'user_email' => $user_info->email,
            'building_type' => $property_info->building_type,
            'area_size' => $property_info->area_size
        ]);
        return redirect('/service/success');
    }

    public function success()
    {
        return view('tenant.service_ordering.success');
    }
}
