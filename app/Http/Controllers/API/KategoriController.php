<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ApiFormat;
use App\Models\Kategorikegiatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class KategoriController extends Controller
{
        public function index(){
            $data = Kategorikegiatan::all();

            if($data){
                return ApiFormat::createApi(200,'Success',$data);
            }else{
                return ApiFormat::createApi(400,'Failed');
            }
        }

        public function store(Request $request){
            try{
                $validate= $request->validate([
                    'kodekategori' => 'required',
                    'namakategori' => 'required',
                    'keterangan' => 'required'
                ]);

                Kategorikegiatan::create($validate);

                return ApiFormat::createApi(200,'Success','Data Berhasil diinput');
            }catch(Exception $error){
                $info = "Error Kesalahan dalam penginputan";
                return ApiFormat::createApi(422,'error',$info);
            }
        }

        public function delete($kodekategori){
            if($kodekategori){
                
                DB::table('Kategorikegiatans')->where('kodekategori',$kodekategori)->delete();
                return ApiFormat::createApi(200,'Success','Data Berhasil dihapus');
            }else{
                return ApiFormat::createApi(400, "error");
            }
        }

        public function edit($kodekategori){
            $data = DB::table('Kategorikegiatans')->where('kodekategori',$kodekategori)->get() ;
            if($data){
                return ApiFormat::createApi(200,"success",$data);
            }else{
                return ApiFormat::createApi(400,"error");
            }
        }

        public function update(Request $request , $kodekategori){

                // $validate= $request->validate([
                //     'namakategori' => 'required',
                //     'keterangan' => 'required'
                // ]);

                $isi = [
                    'namakategori' => 'required',
                    'keterangan' => 'required'
                ];

                $isidta =[
                    'namakategori' => $request->namakategori,
                    'keterangan' => $request->keterangan
                ];
                $validate = validator::make($request->all(),$isi);
                if($validate->fails()){
                    return ApiFormat::createApi(422,"error");
                }else{
                    $data =  Kategorikegiatan::where('kodekategori',$kodekategori)->update($isidta);
                    return ApiFormat::createApi(200,"Success","Data berhasil diupdate");
                }
            
        }

}
