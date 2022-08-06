<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyModel;
use App\Models\PropertyPriceModel;
use App\Models\PropertyTenantModel;
use App\Models\PropertyImageModel;
use App\Models\RepairServiceModel;
use App\Models\PropertyRepairServiceModel;
use App\Models\UserModel;

class Properties extends Controller
{
    public function propertyList(Request $request)
    {
        $user_id = session('id');
        $user = UserModel::find($user_id);
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
        return view('landlord.property.list')->with(['properties'=>$properties, 'user'=>$user]);
    }

    public function propertyDetails($id)
    {
        $user_id = session('id');
        $user = UserModel::find($user_id);
        $property = PropertyModel::find($id);
        $services = RepairServiceModel::where('user_id', $user_id)->get();
        $prices = PropertyPriceModel::where('property_id', $id)->get();
        $suggested_services = PropertyRepairServiceModel::where('property_id', $id)->get();
        return view('landlord.property.details')->with(['property'=>$property, 'user'=>$user, 'services'=>$services, 'prices'=>$prices, 'suggested_services'=> $suggested_services]);
    }

    public function propertyCreateForm(Request $request)
    {
        $user_id = session('id');
        $user = UserModel::find($user_id);
        $services = RepairServiceModel::where('user_id', $user_id)->get();
        return view('landlord.property.create')->with(['services'=>$services, 'user'=>$user]);
    }

    public function propertyCreate(Request $request)
    {
        if(isset($request->image)){
            $imageName = time().'0.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $request->request->add(['image_url'=>'/images/'.$imageName]);
        }
        $user_id = session('id');
        $request->request->add(['user_id'=>$user_id]);
        $property = PropertyModel::create($request->except(['_token','image','image1','image2','image3','repair_service_id', 'interval', 'price', 'price_id']));
        $id = $property->id;

        if(isset($request->image1)){
            $imageName = time().'0.'.$request->image1->extension();
            $request->image1->move(public_path('images'), $imageName);
            PropertyImageModel::create(['property_id'=>$id, 'image_url'=>'/images/'.$imageName]);
        }
        if(isset($request->image2)){
            $imageName = time().'0.'.$request->image2->extension();
            $request->image2->move(public_path('images'), $imageName);
            PropertyImageModel::create(['property_id'=>$id, 'image_url'=>'/images/'.$imageName]);
        }
        if(isset($request->image3)){
            $imageName = time().'0.'.$request->image3->extension();
            $request->image3->move(public_path('images'), $imageName);
            PropertyImageModel::create(['property_id'=>$id, 'image_url'=>'/images/'.$imageName]);
        }

        PropertyRepairServiceModel::where('property_id',$id)->delete();
        $service_ids = $request->input('repair_service_id', []);
        for($i=0; $i<count($service_ids); $i++){
            PropertyRepairServiceModel::create(['property_id'=>$id, 'repair_service_id'=>$service_ids[$i]]);
        }

        $interval = $request->input('interval');
        $price = $request->input('price');
        PropertyPriceModel::create(['interval'=>$interval, 'price'=>$price, 'property_id'=>$property->id]);

        
        return redirect('/manage/property');
    }

    public function propertyUpdate(Request $request, $id)
    {
        if(isset($request->image)){
            $imageName = time().'0.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $request->request->add(['image_url'=>'/images/'.$imageName]);
        }
        if(isset($request->image1)){
            $imageName = time().'0.'.$request->image1->extension();
            $request->image1->move(public_path('images'), $imageName);
            PropertyImageModel::create(['property_id'=>$id, 'image_url'=>'/images/'.$imageName]);
        }
        if(isset($request->image2)){
            $imageName = time().'0.'.$request->image2->extension();
            $request->image2->move(public_path('images'), $imageName);
            PropertyImageModel::create(['property_id'=>$id, 'image_url'=>'/images/'.$imageName]);
        }
        if(isset($request->image3)){
            $imageName = time().'0.'.$request->image3->extension();
            $request->image3->move(public_path('images'), $imageName);
            PropertyImageModel::create(['property_id'=>$id, 'image_url'=>'/images/'.$imageName]);
        }

        PropertyRepairServiceModel::where('property_id',$id)->delete();
        $service_ids = $request->input('repair_service_id', []);
        for($i=0; $i<count($service_ids); $i++){
            PropertyRepairServiceModel::create(['property_id'=>$id, 'repair_service_id'=>$service_ids[$i]]);
        }

        $price_ids = $request->input('price_id', []);
        $intervals = $request->input('interval', []);
        $prices = $request->input('price', []);
        for($i=0; $i<count($price_ids); $i++){
            PropertyPriceModel::where('id', $price_ids[$i])->update(['interval'=>$intervals[$i], 'price'=>$prices[$i]]);
        }

        PropertyModel::where('id',$id)->update($request->except(['_token','image','image1','image2','image3','repair_service_id', 'interval', 'price', 'price_id']));
        return redirect('/properties/'.$id);
    }

    public function createPrice($id)
    {
        PropertyPriceModel::create([
            'property_id'=>$id,
            'interval'=>1,
            'price'=>100.00
        ]);
        return redirect('/properties/'.$id);
    }

    public function deletePrice($id)
    {
        $property_id = $_GET['property_id'];
        PropertyPriceModel::where('id', $id)->delete();
        return redirect('/properties/'.$property_id);
    }
}
