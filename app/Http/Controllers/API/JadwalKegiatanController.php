<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\jadwalkegiatan;
use App\Models\Post_jadwalkegiatan;
use App\Models\Vihara;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ApiFormat;
use Carbon\Carbon;

class JadwalKegiatanController extends Controller
{
    public function view(){
        $data = jadwalkegiatan::all();

        if($data){
            return ApiFormat::createApi(200,'Success',$data);
        }else{
            return ApiFormat::createApi(422,'Error');
        }
    }
    public function save(Request $request){
        $isi = [
            'kode_kegiatan' => 'required',
            'email' => 'required',
            'status_jadwal' => 'required',
            'deskripsi'=>'nullable'
        ];

        $isidta =[
            'kode_kegiatan' => $request-> kode_kegiatan,
            'email'  =>  $request->email,
            'status_jadwal' =>  $request->status_jadwal,
        ];
        $validate = validator::make($request->all(),$isi);
        if($validate->fails()){
            return ApiFormat::createApi(422,"error");
        }else{
            $cek = jadwalkegiatan::where('kode_kegiatan' , $request->kode_kegiatan)->count();
            if($cek == 0 || $cek == null){
                jadwalkegiatan::create($isidta);
            }
            return ApiFormat::createApi(200,"Success","data berhasil");
        }
    }

    
    public function cekkode($kode_kegiatan){
        $data = jadwalkegiatan::where("kode_kegiatan",$kode_kegiatan)->count();
        return ApiFormat::createApi(200,"success",$data);
        
    }
    public function editstatus(Request $request , $kode_kegiatan){
        $isi = [
            'status_jadwal' => $request->status_jadwal
        ];
        if($kode_kegiatan){
            $data=jadwalkegiatan::where("kode_kegiatan",$kode_kegiatan)->get();
            jadwalkegiatan::where("kode_kegiatan",$kode_kegiatan)->update($isi);
            return ApiFormat::createApi(200,"success",$data);
        }else{
            return ApiFormat::createApi(422,"error");
        }
    }

    public function getjadwals($kode_kegiatan){
        $data = jadwalkegiatan::where('kode_kegiatan',$kode_kegiatan)->get();
        if($data ){
            return ApiFormat::createApi(200,"success",$data);
        }else{
            return ApiFormat::createApi(200,"success",$data);
        }
    }

    public function viewpstjadwal(){
        $data = Post_jadwalkegiatan::join('vihara','post_jadwalkegiatan.kode_vihara','=','vihara.kode_vihara') 
                                    ->select('post_jadwalkegiatan.*','vihara.nama_vihara')
                                    ->get();
        if($data){
            return ApiFormat::createApi(200,"success",$data);
        }else{
            return ApiFormat::createApi(422,"error");
        }
    }

    public function klarifikasijadwal(){
        $data = Vihara::with([
            'postJadwal' => function($query){
                return $query->select('kode_posting', 'kode_vihara','tanggal_kegiatan','tglselesai_kegiatan','mulai_kegiatan','selesai_kegiatan','lama_kegiatan','nama_penceramah','judul_kegiatan');
            }
            ])->get();
        if($data){
            return ApiFormat::createApi(200,"success",$data);
        }else{
            return ApiFormat::createApi(422,"error");
        }
    }

    public function getkegiatanqr($kodeposting){
        $data = Post_jadwalkegiatan::where('kode_posting',$kodeposting)->get();
        return view('pages/layouts-scanabsensi',compact('data'));
    }

    public function cekdataumat(){
        $dateToSearch = Carbon::tomorrow()->toDateString();
        $today = Carbon::now()->toDateString();
        $data = DB::table('pendiksaan')
        ->join(DB::raw('(SELECT * FROM detail_pendiksaan ORDER BY id DESC LIMIT 1) AS d'), function ($join) {
            $join->on('pendiksaan.kode_diksa', '=', 'd.kode_diksa');
        })
        ->join(DB::raw('(SELECT kode_diksa, COUNT(*) AS total_detail_pendiksaan FROM detail_pendiksaan GROUP BY kode_diksa) AS t'), function ($join) {
            $join->on('pendiksaan.kode_diksa', '=', 't.kode_diksa');
        })
        ->where('pendiksaan.tanggal_diksa', '>=', $dateToSearch)
        ->orderBy('pendiksaan.tanggal_diksa', 'asc')
        ->select('pendiksaan.kode_diksa', 'pendiksaan.tanggal_diksa', 'pendiksaan.kode_vihara', 'pendiksaan.email',
            'd.id AS id', 'd.kategori_pendiksa', 'd.nama_pendiksa', 'd.Jenis_kel AS Jenis_kel', 'd.no_hp', 'd.tgl_lahir',
            't.total_detail_pendiksaan'
        )
        ->groupBy('pendiksaan.kode_diksa', 'pendiksaan.tanggal_diksa', 'pendiksaan.kode_vihara', 'pendiksaan.email', 'd.id', 'd.kategori_pendiksa', 'd.nama_pendiksa', 'd.Jenis_kel', 'd.no_hp', 'd.tgl_lahir', 't.total_detail_pendiksaan')
        ->limit(1)
        ->get();
        if($data){
            return ApiFormat::createApi(200,"success",$data);
        }else{
            return ApiFormat::createApi(200,"success","TIDAK ADA DATA PENDIKSAAN!");
        }   
    }
    public function cekberapadiksa(){
        // Mendapatkan tanggal awal dan akhir minggu ini
        $today = Carbon::now();
        $startOfWeek = $today->startOfWeek()->toDateString();
        $endOfWeek = $today->endOfWeek()->toDateString();

            // Mendapatkan total orang yang diksa pada minggu ini dari tabel detail_pendiksaan
            $totalDetailPendiksaan = DB::table('detail_pendiksaan')
            ->join('pendiksaan', 'detail_pendiksaan.kode_diksa', '=', 'pendiksaan.kode_diksa')
            ->whereBetween('pendiksaan.tanggal_diksa', [$startOfWeek, $endOfWeek])
            ->count();

            // Menghitung total keseluruhan
            $total =  $totalDetailPendiksaan;

            return ApiFormat::createApi(200,"success",$total);
    }

    public function jadwalviewall(){
        $result = DB::table('post_jadwalkegiatan')
        ->select('post_jadwalkegiatan.kode_posting', 'post_jadwalkegiatan.kodekategori', 'kategorikegiatans.namakategori', 'post_jadwalkegiatan.kode_vihara', 'vihara.nama_vihara', 'post_jadwalkegiatan.judul_kegiatan', 'post_jadwalkegiatan.tanggal_kegiatan', 'post_jadwalkegiatan.tglselesai_kegiatan', 'post_jadwalkegiatan.mulai_kegiatan', 'post_jadwalkegiatan.selesai_kegiatan', 'absensi.id', 'absensi.email', 'userinformations.nama_mandarin', 'userinformations.nama_indonesia', 'absensi.waktu_absensi')
        ->leftJoin('absensi', 'post_jadwalkegiatan.kode_posting', '=', 'absensi.kode_posting')
        ->leftJoin('kategorikegiatans', 'post_jadwalkegiatan.kodekategori', '=', 'kategorikegiatans.kodekategori')
        ->leftJoin('vihara', 'post_jadwalkegiatan.kode_vihara', '=', 'vihara.kode_vihara')
        ->leftJoin('userinformations', 'absensi.email', '=', 'userinformations.email')
        ->get();
        $data = [];
        foreach ($result as $absensi) {
            $kode_posting = $absensi->kode_posting;

            // Jika kode_posting belum ada dalam $data, tambahkan sebagai elemen baru
            if (!isset($data[$kode_posting])) {
                $data[$kode_posting] = [
                    'kode_posting' => $kode_posting,
                    'kodekategori' => $absensi->kodekategori,
                    'namakategori' => $absensi->namakategori,
                    'kode_vihara' => $absensi->kode_vihara,
                    'nama_vihara' => $absensi->nama_vihara,
                    'judul_kegiatan' => $absensi->judul_kegiatan,
                    'tanggal_kegiatan' => $absensi->tanggal_kegiatan,
                    'tglselesai_kegiatan' => $absensi->tglselesai_kegiatan,
                    'mulai_kegiatan' => $absensi->mulai_kegiatan,
                    'selesai_kegiatan' => $absensi->selesai_kegiatan,
                    'Data_absensi' => [],
                    'total_data_absen' => 0 // Inisialisasi dengan nilai awal 0
                ];
            }

            // Tambahkan data absensi ke dalam jadwal kegiatan yang sesuai
            if ($absensi->id !== null) { // Hanya tambahkan jika id tidak null
                $data[$kode_posting]['Data_absensi'][] = [
                    'id' => $absensi->id,
                    'email' => $absensi->email,
                    'nama_mandarin' => $absensi->nama_mandarin,
                    'nama_indonesia' => $absensi->nama_indonesia,
                    'waktu_absensi' => $absensi->waktu_absensi
                ];

                // Increment total_data_absen
                $data[$kode_posting]['total_data_absen']++;
            }
        }

        $data = array_values($data); // Mengubah kembali ke array numerik

        return ApiFormat::createApi(200,"success",$data);
    }

    public function jadwalviewbetween(Request $request){
        $startDate = $request->from_date;
        $endDate = $request->to_date;

        $result = DB::table('post_jadwalkegiatan')
        ->select('post_jadwalkegiatan.kode_posting', 'post_jadwalkegiatan.kodekategori', 'kategorikegiatans.namakategori', 'post_jadwalkegiatan.kode_vihara', 'vihara.nama_vihara', 'post_jadwalkegiatan.judul_kegiatan', 'post_jadwalkegiatan.tanggal_kegiatan', 'post_jadwalkegiatan.tglselesai_kegiatan', 'post_jadwalkegiatan.mulai_kegiatan', 'post_jadwalkegiatan.selesai_kegiatan', 'absensi.id', 'absensi.email', 'userinformations.nama_mandarin', 'userinformations.nama_indonesia', 'absensi.waktu_absensi')
        ->leftJoin('absensi', 'post_jadwalkegiatan.kode_posting', '=', 'absensi.kode_posting')
        ->leftJoin('kategorikegiatans', 'post_jadwalkegiatan.kodekategori', '=', 'kategorikegiatans.kodekategori')
        ->leftJoin('vihara', 'post_jadwalkegiatan.kode_vihara', '=', 'vihara.kode_vihara')
        ->leftJoin('userinformations', 'absensi.email', '=', 'userinformations.email')
        ->whereBetween('post_jadwalkegiatan.tglselesai_kegiatan',[$startDate,$endDate])
        ->get();
        $data = [];
        foreach ($result as $absensi) {
            $kode_posting = $absensi->kode_posting;

            // Jika kode_posting belum ada dalam $data, tambahkan sebagai elemen baru
            if (!isset($data[$kode_posting])) {
                $data[$kode_posting] = [
                    'kode_posting' => $kode_posting,
                    'kodekategori' => $absensi->kodekategori,
                    'namakategori' => $absensi->namakategori,
                    'kode_vihara' => $absensi->kode_vihara,
                    'nama_vihara' => $absensi->nama_vihara,
                    'judul_kegiatan' => $absensi->judul_kegiatan,
                    'tanggal_kegiatan' => $absensi->tanggal_kegiatan,
                    'tglselesai_kegiatan' => $absensi->tglselesai_kegiatan,
                    'mulai_kegiatan' => $absensi->mulai_kegiatan,
                    'selesai_kegiatan' => $absensi->selesai_kegiatan,
                    'Data_absensi' => [],
                    'total_data_absen' => 0 // Inisialisasi dengan nilai awal 0
                ];
            }

            // Tambahkan data absensi ke dalam jadwal kegiatan yang sesuai
            if ($absensi->id !== null) { // Hanya tambahkan jika id tidak null
                $data[$kode_posting]['Data_absensi'][] = [
                    'id' => $absensi->id,
                    'email' => $absensi->email,
                    'nama_mandarin' => $absensi->nama_mandarin,
                    'nama_indonesia' => $absensi->nama_indonesia,
                    'waktu_absensi' => $absensi->waktu_absensi
                ];

                // Increment total_data_absen
                $data[$kode_posting]['total_data_absen']++;
            }
        }

        $data = array_values($data); // Mengubah kembali ke array numerik

       if($data){
        return ApiFormat::createApi(200,"success",$data);
       }else{
        return ApiFormat::createApi(200,"success","data tidak ditemukan");
       }
    }

}
