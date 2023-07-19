<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ApiFormat;
use App\Models\Reservasidiksa;
use App\Models\Kartudiksa;
use Illuminate\Support\Facades\DB;


class ReservdiksaController extends Controller
{
    public function store(Request $request){
        $data = $request->json()->all();

        $errors = [];
        $validData = [];

        foreach ($data as $item) {
            $validator = Validator::make($item, [
                'kode_diksa' => 'required|numeric',
                'katepdf' => 'required',
                'namapdf' => 'required',
                'tgllpdf' => 'required|date',
                'jeniskelpdf' => 'required'
            ]);
            
    
            if ($validator->fails()) {
                $errors[] = $validator->errors();
            }else{
                $isireservasi = [
                    'kode_diksa' =>  $item['kode_diksa'],
                    'kategori_pendiksa' => $item['katepdf'],
                    'nama_pendiksa'=> $item['namapdf'],
                    'no_hp' => $item['nohppdf'],
                    'tgl_lahir' => $item['tgllpdf'],
                    'Jenis_kel' => $item['jeniskelpdf']
                ];
                $validData[] = $isireservasi;
                
            }
        }
    
        if (!empty($errors)) {
            return ApiFormat::createApi(422, "error", $errors);
        }else{
            foreach ($validData as $data) {
                Reservasidiksa::create($data);
               
            }
            return ApiFormat::createApi(200,"Success" );
        }
        // $validator = validator::make($data,[
        //     'kode_diksa' => 'required|numeric',
        //     'katepdf' => 'required',
        //     'namapdf' => 'required',
        //     'tgllpdf' => 'required|date',
        //     'jeniskelpdf'=>'required'
        // ]);
        // if($validator->fails()){
        //     return ApiFormat::createApi(422,"error",$validator->errors());
        // }else{
        //     //  $isireservasi = [
        //     //     'kode_diksa' =>  $request->kode_diksa,
        //     //     'kategori_pendiksa' => $request->katepdf,
        //     //     'nama_pendiksa'=> $request->namapdf,
        //     //     'no_hp' => $request->nohppdf,
        //     //     'tgl_lahir' => $request->tgllpdf,
        //     //     'Jenis_kel' => $request->jeniskelpdf
        //     // ];
        //     // Reservasidiksa::create($isireservasi);
        //     // return ApiFormat::createApi(200,"Success",$isireservasi);
        //     return ApiFormat::createApi(200,"Success",$data);
        // }
     
    }
    
    public function  cekkartu(Request $request){

        $id = $request->id;
    
        $cekadakartu = KartuDiksa::join('detail_pendiksaan', 'kartudiksa.id', '=', 'detail_pendiksaan.id')
                ->where('kartudiksa.id', $id)
                ->exists();

        if($cekadakartu){
            return ApiFormat::createApi(200,"Success","ditemukan");
        }else{
            return ApiFormat::createApi(200,"Error","tidak ditemukan");
        }
    }
}
