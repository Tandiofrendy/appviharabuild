<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Post_jadwalkegiatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ApiFormat;

class absensiController extends Controller
{
    public function cekkodeqr(Request $request){
        $kodeqr = $request->kodeqr;
        $eml = $request->email;
        if(Post_jadwalkegiatan::where('kodeqr',$kodeqr)->exists()){
            $kode_postings = Post_jadwalkegiatan::where('kodeqr',$kodeqr)->select('kode_posting')->first();
            if(Absensi::where('email',$request->email)->where('kode_posting','like',$kode_postings->kode_posting)->exists()){
                $qpresensi = Absensi::join('post_jadwalkegiatan','absensi.kode_posting','=','post_jadwalkegiatan.kode_posting')
                            ->join('userinformations','absensi.email','=','userinformations.email')
                            ->where('absensi.email',$eml)
                            ->select('absensi.id','absensi.email','absensi.waktu_absensi','post_jadwalkegiatan.judul_kegiatan','userinformations.nama_indonesia')
                            ->get();
                return ApiFormat::createApi(200,'error',$qpresensi);
            }else{
                $data = [
                    'email' => $request->email,
                    'waktu_absensi'=>$request->waktu_absensi,
                    'kode_posting' =>$kode_postings->kode_posting
                ];
                $store =  Absensi::insert(($data));
                $qpresensi = Absensi::join('post_jadwalkegiatan','absensi.kode_posting','=','post_jadwalkegiatan.kode_posting')
                            ->join('userinformations','absensi.email','=','userinformations.email')
                            ->where('absensi.email',$eml)
                            ->select('absensi.id','absensi.email','absensi.waktu_absensi','post_jadwalkegiatan.judul_kegiatan','userinformations.nama_indonesia')
                            ->get();
                return ApiFormat::createApi(200,'success',$qpresensi);
            };
            

        }else{
            return ApiFormat::createApi(200,'success',"jadwal tidak ditemukan");
        }
    }

    public function getkodeqr($kodeposting){
        $data = Post_jadwalkegiatan::where('kode_posting',$kodeposting)->select('kodeqr')->first();
        
    }
}
