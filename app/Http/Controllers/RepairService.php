<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RepairServiceModel;
use App\Models\PropertyRepairServiceModel;
use App\Models\UserModel;

class RepairService extends Controller
{
    public function serviceList()
    {
        $user_id = session('id');
        $user = UserModel::find($user_id);
        $services = RepairServiceModel::where('user_id',$user_id)->get();
        return view('landlord.repair_service.list')->with(['services'=>$services, 'user'=>$user]);
    }

    public function serviceDetails($id)
    {
        $user_id = session('id');
        $user = UserModel::find($user_id);
        $service = RepairServiceModel::find($id);
        return view('landlord.repair_service.details')->with(['service'=>$service, 'user'=>$user]);
    }

    public function serviceCreateForm(Request $request)
    {
        $user_id = session('id');
        $user = UserModel::find($user_id);
        $service = new RepairServiceModel;
        return view('landlord.repair_service.create')->with(['service'=>$service, 'user'=>$user]);
    }

    public function serviceCreate(Request $request)
    {
        RepairServiceModel::create($request->except(['_token']));
        return redirect('/manage/service');
    }

    public function serviceUpdate(Request $request, $id)
    {
        RepairServiceModel::where('id',$id)->update($request->except(['_token']));
        return redirect('/service/'.$id);
    }

    public function serviceDelete($id)
    {
        RepairServiceModel::where('id',$id)->delete();
        PropertyRepairServiceModel::where('repair_service_id', $id)->delete();

        return redirect('/manage/service');
    }
}
