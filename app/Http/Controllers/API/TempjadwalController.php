<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tempjadwalkegiatan;
use App\Models\Post_jadwalkegiatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ApiFormat;
class TempjadwalController extends Controller
{
    public function view(){
        $data = tempjadwalkegiatan::all();

        if($data){
            return ApiFormat::createApi(200,'Success',$data);
        }else{
            return ApiFormat::createApi(422,'Error');
        }
    }

    public function save(Request $request){
        $isi = [
            'kode_kegiatan' => 'required',
            'kodekategori' => 'required',
            'kode_vihara' => 'required',
            'judul_kegiatan' => 'required',
            'tanggal_kegiatan' => 'required',
            'tglselesai_kegiatan'=> 'required',
            'mulai_kegiatan' => 'required',
            'selesai_kegiatan' =>  'required',
            'lama_kegiatan' => 'required',
            'nama_penceramah'=>'nullable',
            'keterangan' => 'required',
            'deskripsi' => 'nullable'
        ];

        $isidta =[
            'kode_kegiatan' => $request-> kode_kegiatan,
            'kodekategori' =>  $request->kodekategori,
            'kode_vihara' =>  $request->kode_vihara,
            'judul_kegiatan' =>  $request->judul_kegiatan,
            'tanggal_kegiatan' =>  $request->tanggal_kegiatan,
            'tglselesai_kegiatan'=> $request->tglselesai_kegiatan,
            'mulai_kegiatan' => $request->mulai_kegiatan,
            'selesai_kegiatan' =>   $request->selesai_kegiatan,
            'lama_kegiatan' =>  $request->lama_kegiatan,
            'nama_penceramah'=> $request->nama_penceramah,
            'keterangan' =>  $request->keterangan
        ];
        $validate = validator::make($request->all(),$isi);
        if($validate->fails()){
            return ApiFormat::createApi(422,"error");
        }else{
            tempjadwalkegiatan::create($isidta);
            return ApiFormat::createApi(200,"Success","Data berhasil diinput");
        }
    }



    public function viewall(){
        $data = tempjadwalkegiatan::join('jadwalkegiatan','temp_jadwalkegiatan.kode_kegiatan','=','jadwalkegiatan.kode_kegiatan')
                ->join('vihara','temp_jadwalkegiatan.kode_vihara','=','vihara.kode_vihara')
                ->join('kategorikegiatans','temp_jadwalkegiatan.kodekategori','=','kategorikegiatans.kodekategori')
                ->select('temp_jadwalkegiatan.*','vihara.nama_vihara','vihara.alamat','kategorikegiatans.namakategori','jadwalkegiatan.status_jadwal','jadwalkegiatan.email')
                ->orderBy('temp_jadwalkegiatan.id','asc')
                ->get();
        
                if($data){
                    return ApiFormat::createApi(200,'Success',$data);
                }else{
                    return ApiFormat::createApi(400,'Failed');
                }
    }         

    public function jadwaltunggu(){
        $data =  tempjadwalkegiatan::join('jadwalkegiatan','temp_jadwalkegiatan.kode_kegiatan','=','jadwalkegiatan.kode_kegiatan')
                                ->join('vihara','temp_jadwalkegiatan.kode_vihara','=','vihara.kode_vihara')
                                ->join('kategorikegiatans','temp_jadwalkegiatan.kodekategori','=','kategorikegiatans.kodekategori')
                                ->select('temp_jadwalkegiatan.judul_kegiatan','temp_jadwalkegiatan.tanggal_kegiatan','temp_jadwalkegiatan.tglselesai_kegiatan','temp_jadwalkegiatan.mulai_kegiatan','temp_jadwalkegiatan.selesai_kegiatan','vihara.nama_vihara','kategorikegiatans.namakategori','temp_jadwalkegiatan.lama_kegiatan','jadwalkegiatan.status_jadwal','temp_jadwalkegiatan.deskripsi','temp_jadwalkegiatan.kode_kegiatan','temp_jadwalkegiatan.id')
                                ->orderBy('temp_jadwalkegiatan.id','asc')
                                ->get();

                                if($data){
                                    return ApiFormat::createApi(200,'Success',$data);
                                }else{
                                    return ApiFormat::createApi(400,'Failed');
                                }
    }

    public function sjadwaltunggu($kode_kegiatan){
        $data =  tempjadwalkegiatan::where('kode_kegiatan',$kode_kegiatan)
                ->join('vihara','temp_jadwalkegiatan.kode_vihara','=','vihara.kode_vihara')
                ->join('kategorikegiatans','temp_jadwalkegiatan.kodekategori','=','kategorikegiatans.kodekategori')
                ->select('vihara.nama_vihara','kategorikegiatans.namakategori','temp_jadwalkegiatan.id','temp_jadwalkegiatan.judul_kegiatan','temp_jadwalkegiatan.tanggal_kegiatan','temp_jadwalkegiatan.tglselesai_kegiatan','temp_jadwalkegiatan.mulai_kegiatan','temp_jadwalkegiatan.selesai_kegiatan','temp_jadwalkegiatan.lama_kegiatan','temp_jadwalkegiatan.deskripsi')
                ->orderBy('temp_jadwalkegiatan.id','asc')
                ->get();
                
            if($data){
                    return ApiFormat::createApi(200,'Success',$data);
            }else{
                    return ApiFormat::createApi(400,'Failed');
            }
    }
    
    public function edit($id){
        $data = tempjadwalkegiatan::where("id",$id)->get();

        if($data){
            return ApiFormat::createApi(200,'Success',$data);
        }else{
            return ApiFormat::createApi(400,'Failed');
        }   
    }

    public function update(Request $request , $id){
        $isi = [

            'kodekategori' => 'required',
            'kode_vihara' => 'required',
            'judul_kegiatan' => 'required',
            'tanggal_kegiatan' => 'required',
            'tglselesai_kegiatan'=> 'required',
            'mulai_kegiatan' => 'required',
            'selesai_kegiatan' =>  'required',
            'lama_kegiatan' => 'required',
            'nama_penceramah'=>'nullable',
            'keterangan' => 'required'
        ];

        $isidta =[

            'kodekategori' =>  $request->kodekategori,
            'kode_vihara' =>  $request->kode_vihara,
            'judul_kegiatan' =>  $request->judul_kegiatan,
            'tanggal_kegiatan' =>  $request->tanggal_kegiatan,
            'tglselesai_kegiatan'=> $request->tglselesai_kegiatan,
            'mulai_kegiatan' => $request->mulai_kegiatan,
            'selesai_kegiatan' =>   $request->selesai_kegiatan,
            'lama_kegiatan' =>  $request->lama_kegiatan,
            'nama_penceramah'=> $request->nama_penceramah,
            'keterangan' =>  $request->keterangan
        ];
        $validate = validator::make($request->all(),$isi);
        if($validate->fails()){
            return ApiFormat::createApi(422,"error");
        }else{
            tempjadwalkegiatan::where("id",$id)->update($isidta);
            return ApiFormat::createApi(200,"Success","Data berhasil berhasil diupdate");
        }
    }

    public function delete($id){
        if($id){
            tempjadwalkegiatan::where("id",$id)->delete();
            return ApiFormat::createApi(200,'Success','Data Berhasil dihapus');
        }else{
            return ApiFormat::createApi(400, "error","proses hapus gagal!");
        }
    }

    public function updatedesk(Request $request , $id){
        if($request->deskripsi){
            $isiupdate = [
                'deskripsi' => $request->deskripsi
            ];
            tempjadwalkegiatan::where("id",$id)->update($isiupdate);
            return ApiFormat::createApi(200,"Success","Data berhasil berhasil diupdate");
        }else{
            return ApiFormat::createApi(422,"error");
        }
    }

    public function posting(Request $request,$id){
       

       
    //     $cek1 = tempjadwalkegiatan::count();
    //    if($cek1 != null || $cek1 != 0){
    //         $kode_post = [
    //             'kode_posting' => $request->kode_posting
    //         ];
    //         Post_jadwalkegiatan::create($kode_post);
    //         return ApiFormat::createApi(200,"success");
           
    //     }

       

    }

    public function getdataposting($id){
        $datatemp = tempjadwalkegiatan::where('id',$id)
        ->join('jadwalkegiatan','temp_jadwalkegiatan.kode_kegiatan','=','jadwalkegiatan.kode_kegiatan')
        ->select('temp_jadwalkegiatan.*','jadwalkegiatan.email')
        ->orderBy('temp_jadwalkegiatan.id','asc')
        ->get();

        tempjadwalkegiatan::where('id',$id)->delete();
        $cek = tempjadwalkegiatan::count();
        if($cek == null || $cek == 0){
            DB::table('jadwalkegiatan')->delete();
        }
        return ApiFormat::createApi(200,"Success",$datatemp);
    }

    public function saveposting(Request $request){
        $isi = [
            'kode_posting' => $request->kode_posting,
            'kodekategori' =>  $request->kodekategori,
            'email' => $request->email,
            'kode_vihara' =>  $request->kode_vihara,
            'judul_kegiatan' =>  $request->judul_kegiatan,
            'tanggal_kegiatan' =>  $request->tanggal_kegiatan,
            'tglselesai_kegiatan'=> $request->tglselesai_kegiatan,
            'mulai_kegiatan' => $request->mulai_kegiatan,
            'selesai_kegiatan' =>   $request->selesai_kegiatan,
            'lama_kegiatan' =>  $request->lama_kegiatan,
            'nama_penceramah'=> $request->nama_penceramah,
            'kodeqr' => $request->kodeqr,
            'keterangan' =>  $request->keterangan
        ];

        Post_jadwalkegiatan::create($isi);
        return ApiFormat::createApi(200,"Success","databerhasil");
    }
}   
