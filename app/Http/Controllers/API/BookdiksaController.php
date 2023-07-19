<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ApiFormat;
use App\Models\Bookingdiksa;
use App\Models\Vihara;
use App\Models\reservasidiksa;
use App\Models\Kartudiksa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;


class BookdiksaController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'kode_diksa' => 'required|numeric',
            'kode_vihara' => 'required',
            'email' => 'required|email'
        ]);
        if ($validator->fails()) {
            return ApiFormat::createApi(422, "error", $validator->errors());
        } else {
            $kode_diksa = $request->kode_diksa;
            $tanggal_diksa = $request->tanggal_diksa;
            $kode_vihara = $request->kode_vihara;
            $email = $request->email;
        
            // Cek apakah kode_diksa sudah ada dalam database
            $existingBooking = Bookingdiksa::where('kode_diksa', $kode_diksa)->exists();
        
            if ($existingBooking) {
                $maxAttempt = 99; // Batas maksimal percobaan
                $attempt = 1;
                $isUnique = false;
        
                while (!$isUnique && $attempt <= $maxAttempt) {
                    $nextNumber = str_pad($attempt, 2, '0', STR_PAD_LEFT);
                    $tgl = intval(date('ymd', strtotime($tanggal_diksa)));
                    $kodebookbaru = $tgl . $nextNumber;
        
                    // Cek apakah kode_diksa baru sudah ada dalam database
                    $existingBooking = Bookingdiksa::where('kode_diksa', $kodebookbaru)->exists();
        
                    if (!$existingBooking) {
                        $isUnique = true;
                    }
        
                    $attempt++;
                }
        
                if (!$isUnique) {
                    return ApiFormat::createApi(500, "error", "Gagal membuat kode unik");
                }
        
                $kode_diksa = $kodebookbaru;
            }
        
            $isibooking = [
                'kode_diksa' => $kode_diksa,
                'tanggal_diksa' => $tanggal_diksa,
                'kode_vihara' => $kode_vihara,
                'email' => $email
            ];
        
            Bookingdiksa::create($isibooking);
            return ApiFormat::createApi(200, "success", $isibooking);
        }
        
    }

    public function checkcbt(Request $request){
        $validator = validator::make($request->all(),[
            'tanggal_diksa' => 'required|date'
        ]);
        if($validator->fails()){
            return ApiFormat::createApi(422,"error",$validator->errors());
        }else{
            $date = $request->all();
            $count = DB::table('detail_pendiksaan')
            ->join('pendiksaan', 'detail_pendiksaan.kode_diksa', '=', 'pendiksaan.kode_diksa')
            ->where('pendiksaan.tanggal_diksa', $date)
            ->count();
            return ApiFormat::createApi(200,"success",$count);
        }
    }

    public function checkid(Request $request){
        $kode_diksa = $request->kode_diksa;
        $tanggal_diksa = $request->tanggal_diksa;
        $existingBooking = Bookingdiksa::where('kode_diksa', $kode_diksa)->exists();
        if ($existingBooking) {
            $maxAttempt = 99; // Batas maksimal percobaan
            $attempt = 1;
            $isUnique = false;
            while (!$isUnique && $attempt <= $maxAttempt) {
                $nextNumber = str_pad($attempt, 2, '0', STR_PAD_LEFT);
                $tgl = intval(date('ymd', strtotime($tanggal_diksa)));
                $kodebookbaru = $tgl . $nextNumber;
                // Cek apakah kode_diksa baru sudah ada dalam database
                $existingBooking = Bookingdiksa::where('kode_diksa', $kodebookbaru)->exists();
                if (!$existingBooking) {
                    $isUnique = true;
                }
    
                $attempt++;
            }
    
            if (!$isUnique) {
                return ApiFormat::createApi(500, "error", "Gagal membuat kode unik");
            }
    
            $kode_diksa = $kodebookbaru;
           
        }
        return ApiFormat::createApi(200,"success",$kode_diksa);
    }

    public function checktemp(Request $request){
        $data = DB::table('pendiksaan')
            ->select('pendiksaan.kode_diksa', 'pendiksaan.tanggal_diksa', 'pendiksaan.kode_vihara', 'pendiksaan.email', 'pendiksaan.total_dewasa', 'pendiksaan.total_anak', 'pendiksaan.total_bayi', 'detail_pendiksaan.kategori_pendiksa', 'detail_pendiksaan.nama_pendiksa', 'detail_pendiksaan.no_hp')
            ->leftjoin('detail_pendiksaan', 'pendiksaan.kode_diksa', '=', 'detail_pendiksaan.kode_diksa')
            ->where('pendiksaan.kode_diksa', $request->kode_diksa)
            ->get();

            $total_dewasa = $data[0]->total_dewasa;
            $total_anak = $data[0]->total_anak;
            $total_bayi = $data[0]->total_bayi;
            $total_pendiksa = $total_dewasa + $total_anak + $total_bayi;

        $total_detail = $data->count();
        $count = [
            'kode_diksa' => $data[0]->kode_diksa,
            'tanggal_diksa' => $data[0]->tanggal_diksa,
            'kode_vihara' => $data[0]->kode_vihara,
            'email' => $data[0]->email,
            'total_pendiksa' => $total_pendiksa,
            'total_detail' => $data->isEmpty() ? 0 : $data->count(),
            'detail_pendiksa' => []
        ];
        foreach ($data as $row) {
            if($data === null){
                $detail = null;
            }else{
                $detail = [
                    'kategori_pendiksa' => $row->kategori_pendiksa,
                    'nama_pendiksa' => $row->nama_pendiksa,
                    'no_hp' => $row->no_hp
                ];
            }
            $count['detail_pendiksa'][] = $detail;
        }
        return ApiFormat::createApi(200,"success",$count);
    }

    public function reportdiksa(request $request){
        $validator = validator::make($request->all(),[
            'kode_diksa' => 'required'
        ]);
            $kode_diksa= $request->all();
            // $email = DB::table('pendiksaan')->where('kode_diksa',$kode_diksa)->select('email')->first();
            // $isiemail = $email->email;

        if($validator->fails()){
            return ApiFormat::createApi(422,"error",$validator->errors());
        }else{
            $kode_vhr = DB::table('pendiksaan')->where('kode_diksa',$kode_diksa)->select('kode_vihara')->first();
            $isikode_vihara = $kode_vhr->kode_vihara;

            $result = Vihara::join('pendiksaan', function($joins) use ($isikode_vihara,$kode_diksa) {
                $joins->on('vihara.kode_vihara','=','pendiksaan.kode_vihara')
                ->where('pendiksaan.kode_vihara','=',$isikode_vihara)
                ->where('pendiksaan.kode_diksa','=',$kode_diksa);
            })
            ->select('pendiksaan.kode_diksa','pendiksaan.created_at','pendiksaan.tanggal_diksa','vihara.nama_vihara')
            ->get();
            return ApiFormat::createApi(200,"success",$result);
        }
    }

    public function daftarudiksa(request $request){
        $validator = validator::make($request->all(),[
            'kode_diksa' => 'required'
        ]);
        if($validator->fails()){
            return ApiFormat::createApi(422,"error",$validator->errors());
        }else{
            $kode_diksa= $request->all();
            $data = reservasidiksa::join('pendiksaan', function($join) use ($kode_diksa) {
                  
                $join->on('detail_pendiksaan.kode_diksa','=','pendiksaan.kode_diksa')
                    ->where('pendiksaan.kode_diksa', '=', $kode_diksa);
            })
            ->select('pendiksaan.kode_diksa','pendiksaan.tanggal_diksa','detail_pendiksaan.kategori_pendiksa','detail_pendiksaan.nama_pendiksa','detail_pendiksaan.Jenis_kel','detail_pendiksaan.no_hp','detail_pendiksaan.tgl_lahir')
            ->get();
            return ApiFormat::createApi(200,"success",$data);
        }
           
    }
    public function filterdiksa(request $request){
        $now = Carbon::now()->toDateString();
        $data = DB::table('pendiksaan')
            ->join('detail_pendiksaan', 'pendiksaan.kode_diksa', '=', 'detail_pendiksaan.kode_diksa')
            ->join('users', 'pendiksaan.email', '=', 'users.email')
            ->join('userinformations', 'users.email', '=', 'userinformations.email')
            ->select(
                'pendiksaan.kode_diksa',
                DB::raw('MAX(userinformations.nama_indonesia) as nama_indonesia'),
                DB::raw('COUNT(detail_pendiksaan.id) as total_orang_diksa'),
                DB::raw('MAX(detail_pendiksaan.no_hp) as no_hp'),
                DB::raw("CASE
                    WHEN pendiksaan.tanggal_diksa = '{$now}' THEN 'Sedang melakukan pendiksaan'
                    WHEN pendiksaan.tanggal_diksa < '{$now}' THEN 'Pendiksaan selesai'
                    ELSE 'Menunggu pendiksaan'
                END as status"),
                'pendiksaan.tanggal_diksa'
            )
            ->groupBy('pendiksaan.kode_diksa', 'pendiksaan.tanggal_diksa')
            ->paginate(10);
        $total_semua_diksa = DB::table('detail_pendiksaan')->count();

        $hasil = [
            'results' => [
                'items' => $data->items(), // Mengambil item-item dari Paginator
                'total_semua_diksa' => $total_semua_diksa
            ],
            'total' =>  $data->total(), // Total jumlah item
            'per_page' =>  $data->perPage(), // Jumlah item per halaman
            'current_page' =>  $data->currentPage(), // Halaman saat ini
            'last_page' =>  $data->lastPage() // Halaman terakhir
        ];
        return ApiFormat::createApi(200,"success",$hasil);

    }
    public function filterbydate(request $request){
        $startDate = $request->from_date;
        $endDate = $request->to_date;
        $now = Carbon::now()->toDateString();

        $data = DB::table('pendiksaan')
                ->join('detail_pendiksaan', 'pendiksaan.kode_diksa', '=', 'detail_pendiksaan.kode_diksa')
                ->join('users', 'pendiksaan.email', '=', 'users.email')
                ->join('userinformations', 'users.email', '=', 'userinformations.email')
                ->select(
                    'pendiksaan.kode_diksa',
                    DB::raw('MAX(userinformations.nama_indonesia) as nama_indonesia'),
                    DB::raw('COUNT(detail_pendiksaan.id) as total_orang_diksa'),
                    DB::raw('MAX(detail_pendiksaan.no_hp) as no_hp'),
                    DB::raw("CASE
                        WHEN pendiksaan.tanggal_diksa = '{$now}' THEN 'Sedang melakukan pendiksaan'
                        WHEN pendiksaan.tanggal_diksa < '{$now}' THEN 'Pendiksaan selesai'
                        ELSE 'Menunggu pendiksaan'
                    END as status"),
                    'pendiksaan.tanggal_diksa'
                )
                ->whereBetween('pendiksaan.tanggal_diksa', [$startDate, $endDate])
                ->groupBy('pendiksaan.kode_diksa', 'pendiksaan.tanggal_diksa')
                ->paginate(10);
        return ApiFormat::createApi(200,"success",$data);
        
    }

    public function exfilterdiksa(){
        $now = Carbon::now()->toDateString();
        $data = DB::table('pendiksaan')
            ->join('detail_pendiksaan', 'pendiksaan.kode_diksa', '=', 'detail_pendiksaan.kode_diksa')
            ->join('users', 'pendiksaan.email', '=', 'users.email')
            ->join('userinformations', 'users.email', '=', 'userinformations.email')
            ->select(
                'pendiksaan.kode_diksa',
                'users.email',
                DB::raw('MAX(userinformations.nama_indonesia) as nama_indonesia'),
                DB::raw('COUNT(detail_pendiksaan.id) as total_orang_diksa'),
                DB::raw('MAX(detail_pendiksaan.no_hp) as no_hp'),
                DB::raw("CASE
                    WHEN pendiksaan.tanggal_diksa = '{$now}' THEN 'Sedang melakukan pendiksaan'
                    WHEN pendiksaan.tanggal_diksa < '{$now}' THEN 'Pendiksaan selesai'
                    ELSE 'Menunggu pendiksaan'
                END as status"),
                'pendiksaan.tanggal_diksa'
            )
            ->groupBy('pendiksaan.kode_diksa','users.email', 'pendiksaan.tanggal_diksa')
            ->get();

            $total_semua_diksa = DB::table('detail_pendiksaan')->count();
            
            $hasil = [
                'results' => [
                    'item' => $data,
                    'total_semua_diksa' => $total_semua_diksa
                ]
            ];
            return ApiFormat::createApi(200,"success",$hasil);
    }
    public function exfilterdiksadate(request $request){
        $startDate = $request->from_date;
        $endDate = $request->to_date;
        $now = Carbon::now()->toDateString();
        $data = DB::table('pendiksaan')
            ->join('detail_pendiksaan', 'pendiksaan.kode_diksa', '=', 'detail_pendiksaan.kode_diksa')
            ->join('users', 'pendiksaan.email', '=', 'users.email')
            ->join('userinformations', 'users.email', '=', 'userinformations.email')
            ->select(
                'pendiksaan.kode_diksa',
                'users.email',
                DB::raw('MAX(userinformations.nama_indonesia) as nama_indonesia'),
                DB::raw('COUNT(detail_pendiksaan.id) as total_orang_diksa'),
                DB::raw('MAX(detail_pendiksaan.no_hp) as no_hp'),
                DB::raw("CASE
                    WHEN pendiksaan.tanggal_diksa = '{$now}' THEN 'Sedang melakukan pendiksaan'
                    WHEN pendiksaan.tanggal_diksa < '{$now}' THEN 'Pendiksaan selesai'
                    ELSE 'Menunggu pendiksaan'
                END as status"),
                'pendiksaan.tanggal_diksa'
            )
            ->whereBetween('pendiksaan.tanggal_diksa', [$startDate, $endDate])
            ->groupBy('pendiksaan.kode_diksa','users.email', 'pendiksaan.tanggal_diksa')
            ->get();
            $total_detail_pendiksaan = DB::table('detail_pendiksaan')
                        ->join('pendiksaan', 'detail_pendiksaan.kode_diksa', '=', 'pendiksaan.kode_diksa')
                        ->whereBetween('pendiksaan.tanggal_diksa', [$startDate, $endDate])
                        ->count();
            $hasil = [
                'results' => [
                    'item' => $data,
                    'total_semua_diksa' => $total_detail_pendiksaan
                ]
            ];
            return ApiFormat::createApi(200,"success",$hasil);
    }
    public function getkartudiksa(Request $request){
        $kode = $request->kode_diksa;
        $exists = DB::table('pendiksaan')
            ->where('kode_diksa', $kode)
            ->exists();
            if ($exists) {
                    $results = DB::table('pendiksaan')
                    ->join('detail_pendiksaan', 'pendiksaan.kode_diksa', '=', 'detail_pendiksaan.kode_diksa')
                    ->join('vihara', 'pendiksaan.kode_vihara', '=', 'vihara.kode_vihara')
                    ->select(
                        'pendiksaan.kode_diksa',
                        'pendiksaan.email',
                        'vihara.nama_vihara',
                        'pendiksaan.tanggal_diksa',
                        'detail_pendiksaan.id',
                        'detail_pendiksaan.nama_pendiksa',
                        'detail_pendiksaan.tgl_lahir',
                        'detail_pendiksaan.kategori_pendiksa',
                        'detail_pendiksaan.Jenis_kel'
                    )
                    ->where('pendiksaan.kode_diksa', $kode)
                    ->get();
                    $output = [];
                    foreach ($results as $result) {
                        $dataDetail = [
                            'id' => $result->id,
                            'nama_pendiksa' => $result->nama_pendiksa,
                            'tgl_lahir' => $result->tgl_lahir,
                            'kategori_pendiksa' => $result->kategori_pendiksa,
                            'Jenis_kel' => $result->Jenis_kel
                        ];
                        $output[] = $dataDetail;
                    }
                    $response = [
                        'kode_diksa' => $results[0]->kode_diksa,
                        'email' => $results[0]->email,
                        'nama_vihara' => $results[0]->nama_vihara,
                        'tanggal_diksa' => $results[0]->tanggal_diksa,
                        'data_detail' => $output
                    ];
                    return ApiFormat::createApi(200,"success",$response);
            } else {
                return ApiFormat::createApi(200, "error", "Kode diksa tidak ditemukan !!");
            }

    }

 


}
