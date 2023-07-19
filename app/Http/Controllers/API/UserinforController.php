<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Userinformation;
use App\Helpers\ApiFormat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class userinforController extends Controller
{
    public function index()
    {
        $data  =  Userinformation::all();

        if($data){
            return ApiFormat::createApi(200,"success",$data);
        }else{
            return ApiFormat::createApi(400,"error");
        }
    }

    public function storeinfo(Request $request)
    {
        $isir = [
            'email' => 'required | email ',
            'nama_mandarin' => 'required',
            'nama_indonesia' => 'required',
            'alamat' => 'required',
            'ttlahir'=> 'required',
            'nohp' => 'required',
            'jenis_kelamin' => 'required'
        ];

        $validator = Validator::make($request->all(),$isir);

        if($validator->fails()){
            return response()->json($validator->messages(),422);
        }else{
            $validators = $request->validate($isir);
            Userinformation::create($validators);
            return ApiFormat::createApi(200,"success","data berhasil input"); 
        }
     
    }

    public function cekdatas($email)
    {
        $data = Userinformation::where("email",$email)->get();

        return ApiFormat::createApi(200,"success",$data);
    //    if($data){
    //      return ApiFormat::createApi(200,"success",$data);
    //    }else{
    //      return ApiFormat::createApi(400,"error");
    //    }
    }

    public function updateinfo(Request $request)
    {
        $isi = [
            'email' => 'required | email ',
            'nama_mandarin' => 'required',
            'nama_indonesia' => 'required',
            'alamat' => 'required',
            'ttlahir'=> 'required',
            'nohp' => 'required',
            'jenis_kelamin'=> 'required'
        ];

        $isidata = [
            'nama_mandarin' => $request->nama_mandarin,
            'nama_indonesia' => $request->nama_indonesia,
            'alamat' => $request->alamat,
            'ttlahir'=> $request->ttlahir,
            'nohp' => $request->nohp,
            'jenis_kelamin' => $request->jenis_kelamin
        ];

        $validator = validator::make($request->all(),$isi);

        if($validator->fails()){
            return response()->json($validator->messages(),422);
        }else{
            $data = Userinformation::where('email',$request->email)->update($isidata);
            return ApiFormat::createApi(200,"Success",$data);
        }

    }

    public function destroyinfo($id)
    {
        if($id){
            Userinformation::destroy($id);
            return response()->json([
                "message" => "berhasil di hapus"
            ]);
        }else{
            return ApiFormat::createApi(400, "error");
        }
    }

}
