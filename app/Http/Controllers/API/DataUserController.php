<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\ApiFormat;

class DataUserController extends Controller
{
    public function getAlldata(){
        $data = DB::table('users')
            ->join('userinformations','users.email','=','userinformations.email')
            ->select('users.email','users.name','userinformations.nama_mandarin','userinformations.nama_indonesia','userinformations.alamat','userinformations.ttlahir','userinformations.nohp','userinformations.jenis_kelamin')
            ->get();

        
            if($data){
                return ApiFormat::createApi(200,'Success',$data);
            }else{
                return ApiFormat::createApi(400,'Failed');
            }
    }
}
