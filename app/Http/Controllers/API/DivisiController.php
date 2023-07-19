<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Divisi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ApiFormat;

class DivisiController extends Controller
{
    public function view(){
        $data = Divisi::all();

        if($data){
            return ApiFormat::createApi(200,"success",$data);
        }else{
            return ApiFormat::createApi(400,"error");
        }
    }

    public function simpan(Request $request){

            $validates= [
                'kode_divisi' => 'required |unique:Divisi,kode_divisi',
                'nama_divisi' => 'required |unique:Divisi,nama_divisi',
            ];

            $validate = validator::make($request->all(),$validates);
            if($validate->fails()){
                return ApiFormat::createApi(200,'Success','Terdeteksi kode divisi atau nama divisi sudah di input!');
            }else{
                Divisi::create($request->all());
                return ApiFormat::createApi(200,'Success','Data Berhasil diinput');
            }
                
            
            
            
            
    }

    public function edit($kodedivisi){
        $data = Divisi::where('kode_divisi',$kodedivisi)->get();

        if($data){
            return ApiFormat::createApi(200,"Success",$data);
        }else{
            return ApiFormat::createApi(422,"error");
        }
    }

    public function cekedts($kodedivisi){
        $cekdevisi = Divisi::where('kode_divisi',$kodedivisi)->first();
        if($cekdevisi->roleadmins()->exists()){
            return ApiFormat::createApi(200, "Success","Data ini masih digunakan pada table roleadmin");
            exit;
        }
        return ApiFormat::createApi(200, "Success","");

    }
    public function update(Request $request){
        $isi = [
            'kode_divisi' => 'required',
            'nama_divisi' => 'required'
        ];

        $isidta =[
            'nama_divisi' => $request->nama_divisi
        ];
        $validate = validator::make($request->all(),$isi);
        if($validate->fails()){
            return ApiFormat::createApi(422,"error");
        }else{
            $data =  Divisi::where('kode_divisi',$request->kode_divisi)->update($isidta);
            return ApiFormat::createApi(200,"Success","Data berhasil diupdate");
        }
    }



    public function delete($kodedivisi){
        if($kodedivisi){
            $cekdevisi = Divisi::where('kode_divisi',$kodedivisi)->first();
            if($cekdevisi->roleadmins()->exists()){
                return ApiFormat::createApi(200, "Success","Data tidak dapat dihapus karena masih digunakan pada table RoleAdmin!!");
                exit;
            }
            Divisi::where('kode_divisi',$kodedivisi)->delete();
            return ApiFormat::createApi(200,'Success','Data Berhasil dihapus');
        }else{
            return ApiFormat::createApi(400, "error");
        }
    }
}
