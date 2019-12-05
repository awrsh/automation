<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PersonelModel;

class PermissionsController extends Controller
{
    public function index()
    {
        return view('User.Permission.Permission');
    }

    public function AddPesonals(Request $request)
    {
       PersonelModel::create(
           [
               "personel_name"=>$request->fullname,
               "personel_education"=>$request->Education,
               "personel_username"=>$request->username,
               "personel_password"=>$request->password,
               "personel_codenational"=>$request->certificate_number,
               "personel_phone"=>$request->phone_number,
               "personel_tel"=>$request->telphone,
               "personel_address"=>$request->Address,
               "personel_role"=>$request->responsibility,
               "personel_permissions"=>$request->permissions,
               "personel_status"=>'off',
               "school_id"=>session()->get('ManagerSis')['id'],
           ]
       );
       return \back()->with('succsses','پرسنل با موفقعیت ثبت شد');
    }

    public function StatusPesonals()
    {
        
       $id_personal = request()->post('id_personal');
       $status = request()->post('status');
       if ($status=="off") {
        PersonelModel::where('personel_id',$id_personal)->update([
            'personel_status'=>$status
           ]);
           return 'off';
       }else{
        PersonelModel::where('personel_id',$id_personal)->update([
            'personel_status'=>$status
           ]);
           return 'on';
       }
   
     
    }
}