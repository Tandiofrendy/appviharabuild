<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vihara;
use App\Models\Post_jadwalkegiatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ApiFormat;

class ViharaController extends Controller
{
     public function view(){
        $data = Vihara::all();
        if($data){
            return ApiFormat::createApi(200,"success",$data);
        }else{
            return ApiFormat::createApi(400,"error");
        }
     }

     public function simpan(Request $request){
        $validates= [
            'kode_vihara' => 'required |unique:Vihara,kode_vihara',
            'nama_vihara' => 'required |unique:Vihara,nama_vihara',
            'alamat' => 'required'
        ];
        
        $validate = validator::make($request->all(),$validates);
        if($validate->fails()){
            return ApiFormat::createApi(200,'Success','Terdeteksi kode vihara atau nama vihara telah diinput!');
        }else{
            Vihara::create($request->all());
            return ApiFormat::createApi(200,'Success','Data Berhasil diinput');
        }
       
    }

    public function cekedits($kodevihara){
        $cekvihara =  Vihara::where('kode_vihara',$kodevihara)->select('kode_vihara')->first();
        if($cekvihara->postJadwal()->exists()){
            return ApiFormat::createApi(200,"Success", "Data vihara masih ada dalam proses pembuatan jadwal yakin di ubah ?");
            exit;
        }
        if($cekvihara->pendiksaan()->exists()){
            return ApiFormat::createApi(200, "Success","Data ini ada dipakai pada table Pendiksaan");
            exit;
        }
        if($cekvihara->tempjadwal()->exists()){
            return ApiFormat::createApi(200, "Success","Data ini ada dipakai pada data jadwal");
            exit;
        }
        return ApiFormat::createApi(200,"Success", "");
    }
    public function edit($kodevihara){
        $data = Vihara::where('kode_vihara',$kodevihara)->get();

        if($data){
          
            return ApiFormat::createApi(200,"Success",$data);
        }else{
            return ApiFormat::createApi(422,"error");
        }
    }
    public function update(Request $request){
        $isi = [
            'kode_vihara' => 'required',
            'nama_vihara' => 'required',
            'alamat' => 'required'
        ];

        $isidta =[
            'nama_vihara' => $request->nama_vihara,
            'alamat' => $request->alamat
        ];
        $validate = validator::make($request->all(),$isi);
        if($validate->fails()){
            return ApiFormat::createApi(422,"error");
        }else{
            
            Vihara::where('kode_vihara',$request->kode_vihara)->update($isidta);
            return ApiFormat::createApi(200,"Success","Data berhasil diupdate");
        }
    }

    public function delete($kodevihara){
        if($kodevihara){
          
            
            $cekvihara =  Vihara::where('kode_vihara',$kodevihara)->select('kode_vihara')->first();

            if($cekvihara->postJadwal()->exists()){
                return ApiFormat::createApi(200, "Success","Data tidak dapat dihapus karena masih digunakan pada table Jadwal Kegiatan !!");
                exit;
            }

            if($cekvihara->pendiksaan()->exists()){
                return ApiFormat::createApi(200, "Success","Data tidak dapat dihapus karena masih digunakan pada table Pendiksaan!!");
                exit;
            }

            if($cekvihara->tempjadwal()->exists()){
                return ApiFormat::createApi(200, "Success","Data tidak dapat dihapus, karena data terkait digunakan pada pembuatan jadwal");
                exit;
            }


            Vihara::where('kode_vihara',$kodevihara)->delete();
            return ApiFormat::createApi(200,"Success","data berhasil di hapus");
      
        }else{
            return ApiFormat::createApi(400, "error");
        }
       
    }
}
