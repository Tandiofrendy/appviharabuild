<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roleadmin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ApiFormat;
class RoleAdminController extends Controller
{
    public function view(){
        $data = Roleadmin::join('users','roleadmin.email','=','users.email')
        ->join('divisi','roleadmin.kode_divisi','=','divisi.kode_divisi')
        ->select('roleadmin.*','users.name','divisi.nama_divisi')->get();

        if($data){
            return ApiFormat::createApi(200,'Success',$data);
        }else{
            return ApiFormat::createApi(422,'ERORR');
        }
    }

    public function save(Request $request){

        $isi = [
            'email' => 'required',
            'kode_divisi' => 'required',
            'role' => 'required'
        ];

        $isidta =[
            'email' => $request->email,
            'kode_divisi' =>$request->kode_divisi,
            'role' => $request->role
        ];
        $validate = validator::make($request->all(),$isi);
        if($validate->fails()){
            return ApiFormat::createApi(422,"error");
        }else{
            Roleadmin::create($isidta);
            return ApiFormat::createApi(200,"Success","Data berhasil diinput");
        }
    }

    public function edit($id){
        $data = Roleadmin::find($id);
        if($data){
            return ApiFormat::createApi(200,"success",$data);
        }else{
            return ApiFormat::createApi(400,"error");
        }
    }

    public function update(Request $request , $id){
        $isi = [
            'status'=>'required'
        ];

        $isidta =[
            'status'=>$request->status
        ];
        $validate = validator::make($request->all(),$isi);
        if($validate->fails()){
            return ApiFormat::createApi(422,"error","terdapat Error internal");
        }else{
            Roleadmin::where('id',$id)->update($isidta);
            return ApiFormat::createApi(200,"Success","Data berhasil update");
        }
    }

    public function delete($id){
        if($id){
            Roleadmin::destroy($id);
            return ApiFormat::createApi(200,"Success","Data berhasil dihapus");
        }else{
            return ApiFormat::createApi(422,"error","terdapat Error internal");
        }
    }
}
