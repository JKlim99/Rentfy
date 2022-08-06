<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyModel;
use App\Models\PropertyImageModel;
use App\Models\PropertyPriceModel;
use App\Models\PropertyRepairServiceModel;
use App\Models\PropertyTenantModel;
use App\Models\UserModel;

class Property extends Controller
{
    public function search(Request $request)
    {
        $state = $request->input('state', null);
        $value = $request->input('value', null);
        if($state){
            $properties = PropertyModel::where('state',$state)
                                        ->where('listing_status', 'published')
                                        ->where(function($query) use ($value){
                                            $query->where('name', 'LIKE', '%'.$value.'%');
                                            $query->orWhere('city', 'LIKE', '%'.$value.'%');
                                            $query->orWhere('building_type', 'LIKE', '%'.$value.'%');
                                        })
                                        ->get();    
        }
        else{
            $properties = PropertyModel::where('listing_status', 'published')
                                        ->where(function($query) use ($value){
                                            $query->where('name', 'LIKE', '%'.$value.'%');
                                            $query->orWhere('city', 'LIKE', '%'.$value.'%');
                                            $query->orWhere('building_type', 'LIKE', '%'.$value.'%');
                                        })
                                        ->get();
        }
        return view('tenant.property.list')->with('properties', $properties);
    }

    public function details($id)
    {
        $user_id = session('id');
        $property = PropertyModel::find($id);
        if(!$property)
        {
            return abort(404, "Page not found");
        }
        $prices = PropertyPriceModel::where('property_id', $id)->get();
        $images = PropertyImageModel::where('property_id', $id)->get();
        $services = PropertyRepairServiceModel::where('property_id', $id)->get();
        $rent_information = PropertyTenantModel::where('user_id', $user_id)->where('property_id', $id)->where('status','!=','expired')->where('status','!=','cancelled')->where('status','!=','rejected')->where('status','!=','terminated')->first();
        $rent_information_by_others = PropertyTenantModel::where('property_id', $id)->where('status','!=','pending')->where('status','!=','expired')->where('status','!=','cancelled')->where('status','!=','rejected')->where('status','!=','terminated')->first();
        $user = UserModel::find($property->user_id);
        return view('tenant.property.details')->with(['property'=>$property, 'prices'=>$prices, 'images'=>$images, 'user'=>$user, 'services'=>$services, 'rent_information'=>$rent_information, 'rent_information_by_others'=>$rent_information_by_others]);
    }

    public function rentPage($id)
    {
        $rent_information = PropertyTenantModel::where('property_id', $id)->where('status','!=','pending')->where('status','!=','expired')->where('status','!=','cancelled')->where('status','!=','rejected')->where('status','!=','terminated')->first();
        if($rent_information)
        {
            return abort(404, "Page not found");
        }
        $user_id = session('id');
        $property = PropertyModel::find($id);
        $owner = UserModel::find($property->user_id);
        if(!$property)
        {
            return abort(404, "Page not found");
        }
        $user = UserModel::find($user_id);
        $prices = PropertyPriceModel::where('property_id', $id)->get();
        return view('tenant.property.renting')->with(['property'=>$property, 'user'=>$user, 'prices'=>$prices, 'owner'=>$owner]);
    }

    public function rent(Request $request)
    {
        $user_id = session('id');
        $price_id = $request->input('price_id');
        $property_id = $request->input('property_id');
        $date = $request->input('date', null);
        $email = $request->input('email', null);
        $phone_number = $request->input('phone_number', null);
        $price = PropertyPriceModel::find($price_id);
        $interval = $price->interval;
        $amount = $price->price;
        PropertyTenantModel::create([
            'property_id' => $property_id,
            'user_id' => $user_id,
            'price_id' => $price_id,
            'interval' => $interval,
            'pay_amount' => $amount,
            'started_at' => $date,
            'status' => 'pending'
        ]);

        return redirect('/property/'.$property_id);
    }
}
