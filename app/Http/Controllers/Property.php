<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyModel;
use App\Models\PropertyImageModel;
use App\Models\PropertyPriceModel;
use App\Models\PropertyRepairServiceModel;
use App\Models\UserModel;

class Property extends Controller
{
    public function search(Request $request)
    {
        $state = $request->input('state', null);
        $value = $request->input('value', null);
        if($state){
            $properties = PropertyModel::where('state',$state)
                                        ->where(function($query) use ($value){
                                            $query->where('name', 'LIKE', '%'.$value.'%');
                                            $query->orWhere('city', 'LIKE', '%'.$value.'%');
                                            $query->orWhere('building_type', 'LIKE', '%'.$value.'%');
                                        })
                                        ->get();    
        }
        else{
            $properties = PropertyModel::where(function($query) use ($value){
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
        $property = PropertyModel::find($id);
        $prices = PropertyPriceModel::where('property_id', $id)->get();
        $images = PropertyImageModel::where('property_id', $id)->get();
        $services = PropertyRepairServiceModel::where('property_id', $id)->get();
        $user = UserModel::find($property->user_id);
        return view('tenant.property.details')->with(['property'=>$property, 'prices'=>$prices, 'images'=>$images, 'user'=>$user, 'services'=>$services]);
    }
}
