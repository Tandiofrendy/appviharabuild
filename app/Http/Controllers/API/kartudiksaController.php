<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kartudiksa;
use App\Models\Reservasidiksa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ApiFormat;

class kartudiksaController extends Controller
{
    public function saves(Request $request){
        $data =  $request->all();
        Kartudiksa::create($data);
        return ApiFormat::createApi(200,"success","Data Berhasil di input");
    }    

    public function caridata($id){
        $data = $id;
        $kartuDiksa = KartuDiksa::where("id",$data)->get();
        if ($kartuDiksa) {
            return ApiFormat::createApi(200,"success",$kartuDiksa);
        }
  
    }

    public function update(Request $request,$id){
        $data = [
            'pandita' => $request->pandita,
            'pengajak' => $request->pengajak,
            'penanggung'=> $request->penanggung
        ];

        if($data){
            Kartudiksa::where("id",$id)->update($data);
            DB::table('detail_pendiksaan')
            ->where('id', $id)
            ->update(['nama_pendiksa' => $request->namaumat]);
            return ApiFormat::createApi(200,"success","Update sukses dilakukan");
        }else{
            return ApiFormat::createApi(422,"error");
        }
    }
    
}
